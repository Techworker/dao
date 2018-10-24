<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\UpdateContact;
use App\Http\Requests\UpdateLogin;
use App\Http\Requests\UpdateUser;
use App\KycDocument;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Nova\Tests\Fixtures\CommentPolicy;

class IndexController extends Controller
{
    public function index() {
        $projects = Project::whereIn('status', ['proposed'])->get();
        return view('index', [
            'projects' => $projects
        ]);
    }

    public function profile(Request $request) {
        $area = 'contact';
        if($request->query->has('area')) {
            $area = $request->query->get('area');
        }

        $project = null;
        if($request->query->has('project-id')) {
            $projectId = $request->query->get('project-id');
            $project = Project::whereUserId(\Auth::user()->id)->whereId($projectId)->first();

            if($request->query->has('action')) {
                if($request->query->get('action') === 'propose')
                {
                    if ($project->status === 'draft') {
                        $project->status = 'proposed';
                        $project->save();

                        $request->session()->flash('flash', 'Project proposed!');
                    }
                }
                if($request->query->get('action') === 'unpropose')
                {
                    if ($project->status === 'proposed') {
                        $project->status = 'draft';
                        $project->save();

                        $request->session()->flash('flash', 'Project in draft mode again!');
                    }
                }
                $project = null;

            } else {
                if($project->status !== 'draft') {
                    $request->session()->flash('flash', 'A proposed project cannot be updated.');
                    $project = null;
                }
            }
        }

        return view('profile', [
            'user' => \Auth::user(),
            'documents' => \Auth::user()->kycDocuments,
            'projects' => \Auth::user()->projects,
            'countries' => include base_path('vendor/umpirsky/country-list/data/en/country.php'),
            'area' => $area,
            'project' => $project
        ]);
    }

    public function profileUpdateContact(UpdateContact $request)
    {
        /** @var User $user */
        $user = \Auth::user();

        $avatar = $user->logo;
        if($request->file('avatar') !== null) {
            $avatar = $request->file('avatar')->store('public/users/' . \Auth::user()->id);
        }

        $user->avatar = $avatar;
        $user->bio = $request->get('bio');
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->organization_name = $request->get('organization_name');
        $user->street = $request->get('street');
        $user->postal_code = $request->get('postal_code');
        $user->city = $request->get('city');
        $user->country = $request->get('country');
        $user->address_line_1 = $request->get('address_line_1');
        $user->address_line_2 = $request->get('address_line_2');
        $user->address_line_3 = $request->get('address_line_3');

        $user->save();

        $request->session()->flash('flash', 'Contact data updated successful');

        return response()->json(['success' => true]);
    }

    public function projectAdd(\App\Http\Requests\Project $request)
    {
        $file = "";
        if($request->file('logo') !== null) {
            $file = $request->file('logo')->store('public/projects/' . \Auth::user()->id);
        }

        $project = new Project();
        $project->user_id = \Auth::user()->id;
        $project->title = $request->get('title');
        $project->description = $request->get('description');
        $project->costs = $request->get('costs');
        $project->pasa = $request->get('pasa');
        $project->website = $request->get('website');
        $project->source_code = $request->get('source_code');
        $project->logo = $file;
        $project->save();

        $request->session()->flash('flash', 'Project added successfully.');
        return response()->json(['success' => true]);
    }

    public function projectUpdate(\App\Http\Requests\Project $request, int $id)
    {
        /** @var Project $project */
        $project = Project::whereUserId(\Auth::user()->id)->whereId($id)->whereStatus('draft')->first();
        if($project === null) {
            abort(422);
        }

        $file = $project->logo;
        if($request->file('logo') !== null) {
            $file = $request->file('logo')->store('public/projects/' . \Auth::user()->id);
        }

        $project->title = $request->get('title');
        $project->description = $request->get('description');
        $project->costs = $request->get('costs');
        $project->pasa = $request->get('pasa');
        $project->website = $request->get('website');
        $project->source_code = $request->get('source_code');
        $project->logo = $file;
        $project->save();

        $request->session()->flash('flash', 'Project updated successfully.');
        return response()->json(['success' => true]);
    }

    public function profileUpdateLogin(UpdateLogin $request)
    {
        /** @var User $user */
        $user = \Auth::user();
        if($request->has('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        if($request->has('email')) {
            $user->email = $request->get('email');
        }

        $user->save();

        $request->session()->flash('flash', 'Login data updated successfully.');

        return response()->json(['success' => true]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function kycAdd(Request $request)
    {
        $file = $request->file('file')->store('kyc/' . \Auth::user()->id);
        $doc = new KycDocument();
        $doc->user_id = \Auth::user()->id;
        $doc->filesystem_ident = $file;
        $doc->filesystem_type = 'local';
        $doc->title = $request->get('title');
        $doc->description = $request->get('description');
        $doc->save();

        $request->session()->flash('flash', 'KYC document uploaded successfully.');
        return response()->json(['success' => true]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function kycRemove(Request $request, int $id)
    {
        $doc = KycDocument::whereId($id)->whereUserId(\Auth::user()->id)->first();
        if($doc !== null) {
            $doc->delete();
            $request->session()->flash('flash', 'KYC document deleted.');
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }


    public function transparency() {
        return view('transparency');
    }

    public function contact() {
        return view('contact');
    }

    public function project(Project $project)
    {
        return view('project', [
            'project' => $project,
            'comments' => $project->comments
        ]);
    }

    public function user(User $user)
    {
        return view('user', [
            'localUser' => $user
        ]);
    }

    public function addComment(\App\Http\Requests\Comment $request, Project $project) {
        $comment = new Comment();
        $comment->user_id = \Auth::user()->id;
        $comment->project_id = $project->id;
        $comment->description = $request->get('description');
        $comment->save();

        return response()->json(['success' => true]);
    }
}