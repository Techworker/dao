<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\ContractFeedback
 *
 * @property int $id
 * @property int $contract_id
 * @property int $invoice_id
 * @property string $feedback
 * @property int $audited_user_id
 * @property int $audited
 * @property string $audit_message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback whereAuditMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback whereAudited($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback whereAuditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback whereContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback whereFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractFeedback query()
 */
	class ContractFeedback extends \Eloquent {}
}

namespace App{
/**
 * Class User
 * 
 * Describes a user.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contractor[] $contractors
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * Class ContactDetail
 * 
 * Holds different types of contact details.
 *
 * @property int $id
 * @property int $contractor_id
 * @property string $type
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Contractor $contractor
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactDetail newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\ContactDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactDetail query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactDetail whereContractorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactDetail whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactDetail whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\ContactDetail withoutTrashed()
 */
	class ContactDetail extends \Eloquent {}
}

namespace App{
/**
 * Class Proposal
 * 
 * Describes the data of a proposal.
 *
 * @property int $id
 * @property string|null $ident_code
 * @property int $proposer_contractor_id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $intro
 * @property string|null $description
 * @property string|null $description_html
 * @property string|null $payment_proposal
 * @property string|null $notes_contractor
 * @property string|null $notes_internal
 * @property string|null $website
 * @property string $voting_type
 * @property \Illuminate\Support\Carbon|null $voting_start
 * @property \Illuminate\Support\Carbon|null $voting_end
 * @property int|null $voting_result_pro
 * @property int|null $voting_result_contra
 * @property string|null $source_code
 * @property string|null $proposed_value
 * @property string|null $proposed_currency
 * @property string|null $logo
 * @property string|null $forum_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Contractor $ProposerContractor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contract[] $contracts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProposalDocument[] $documents
 * @property-read mixed $status
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\ModelStatus\Status[] $statuses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal currentStatus($names)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Proposal onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal otherCurrentStatus($names)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereDescriptionHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereForumLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereIdentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereNotesContractor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereNotesInternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal wherePaymentProposal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereProposedCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereProposedValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereProposerContractorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereSourceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereVotingEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereVotingResultContra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereVotingResultPro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereVotingStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereVotingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Query\Builder|\App\Proposal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Proposal withoutTrashed()
 */
	class Proposal extends \Eloquent {}
}

namespace App{
/**
 * Class ProposalDocument
 * 
 * Describes a document attached to a proposal.
 *
 * @property int $id
 * @property int $proposal_id
 * @property string|null $title
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $status
 * @property-read \App\Proposal $proposal
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\ModelStatus\Status[] $statuses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument currentStatus($names)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\ProposalDocument onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument otherCurrentStatus($names)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument whereProposalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProposalDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProposalDocument withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\ProposalDocument withoutTrashed()
 */
	class ProposalDocument extends \Eloquent {}
}

namespace App{
/**
 * Models for addresses.
 *
 * @property int $id
 * @property int $contractor_id
 * @property string|null $address_line_1
 * @property string|null $address_line_2
 * @property string|null $address_line_3
 * @property string|null $street
 * @property string|null $house_number
 * @property string|null $postal_code
 * @property string|null $city
 * @property string|null $country
 * @property string|null $region
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Contractor $contractor
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Address onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereAddressLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereAddressLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereAddressLine3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereContractorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereHouseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Address withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Address withoutTrashed()
 */
	class Address extends \Eloquent {}
}

namespace App{
/**
 * Class Reward
 * 
 * List of rewards.
 *
 * @property int $id
 * @property int $block
 * @property string $pasa
 * @property string $date
 * @property int $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reward newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Reward onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reward query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reward whereBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reward whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reward whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reward wherePasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reward whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reward whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reward withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Reward withoutTrashed()
 */
	class Reward extends \Eloquent {}
}

namespace App{
/**
 * Class KycDocument
 * 
 * Holds a single KYC document.
 *
 * @property int $id
 * @property int $contractor_id
 * @property string $type
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Contractor $contractor
 * @property-read mixed $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\ModelStatus\Status[] $statuses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument currentStatus($names)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\KycDocument onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument otherCurrentStatus($names)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereContractorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\KycDocument withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\KycDocument withoutTrashed()
 */
	class KycDocument extends \Eloquent {}
}

namespace App{
/**
 * Class Comment
 * 
 * Holds comments for proposals.
 *
 * @property int $id
 * @property int $proposal_id
 * @property int $user_id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Proposal $proposal
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Comment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereProposalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Comment withoutTrashed()
 */
	class Comment extends \Eloquent {}
}

namespace App{
/**
 * Class Contractor
 * 
 * Holds data of a contractor.
 *
 * @property int $id
 * @property string|null $ident_code
 * @property int|null $user_id
 * @property string|null $logo
 * @property string|null $slug
 * @property string|null $bio
 * @property string $type
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $company_name
 * @property string|null $public_name
 * @property string|null $pasa
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Address[] $addresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ContactDetail[] $contactDetails
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contract[] $contracts
 * @property-read mixed $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\KycDocument[] $kycDocuments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Proposal[] $proposals
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\ModelStatus\Status[] $statuses
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor currentStatus($names)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Contractor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor otherCurrentStatus($names)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereIdentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor wherePasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor wherePublicName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contractor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Contractor withoutTrashed()
 */
	class Contractor extends \Eloquent {}
}

namespace App{
/**
 * App\MoneyValue
 *
 * @property int $id
 * @property int $PASC
 * @property int $BTC
 * @property int $USD
 * @property int $AUD
 * @property string $money_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\MoneyValue onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue whereAUD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue whereBTC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue whereMoneyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue wherePASC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue whereUSD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MoneyValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MoneyValue withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\MoneyValue withoutTrashed()
 */
	class MoneyValue extends \Eloquent {}
}

namespace App{
/**
 * App\FoundationPayment
 *
 * @property int $id
 * @property int $to_pasa
 * @property float $amount
 * @property string $payload
 * @property string $block
 * @property string $ophash
 * @property int|null $contract_id
 * @property int $time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contract[] $contracts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment whereBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment whereContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment whereOphash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment whereToPasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FoundationPayment whereUpdatedAt($value)
 */
	class FoundationPayment extends \Eloquent {}
}

namespace App{
/**
 * App\Payment
 *
 * @property-read \App\Proposal $proposal
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Payment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Payment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Payment withoutTrashed()
 */
	class Payment extends \Eloquent {}
}

namespace App{
/**
 * App\Invoice
 *
 * @property-read \App\Contract $contract
 * @property-read \App\Contractor $contractor
 * @property-read mixed $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\ModelStatus\Status[] $statuses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice currentStatus($names)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Invoice onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice otherCurrentStatus($names)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Invoice withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Invoice withoutTrashed()
 */
	class Invoice extends \Eloquent {}
}

namespace App{
/**
 * Class Contract
 *
 * @property int $id
 * @property int $proposal_id
 * @property int $contractor_id
 * @property int|null $payment_id
 * @property int $needs_feedback
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon|null $payment_date
 * @property string $total_value
 * @property string|null $role
 * @property string|null $role_description
 * @property string|null $payment_description
 * @property string|null $pasa
 * @property string|null $payload_overwrite
 * @property string|null $tax_declaration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read \App\Contractor $contractor
 * @property-read mixed $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Invoice[] $invoices
 * @property-read \App\FoundationPayment|null $payment
 * @property-read \App\Proposal $proposal
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\ModelStatus\Status[] $statuses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract currentStatus($names)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Contract onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract otherCurrentStatus($names)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereContractorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereNeedsFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract wherePasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract wherePayloadOverwrite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract wherePaymentDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereProposalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereRoleDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereTaxDeclaration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereTotalValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Contract withoutTrashed()
 */
	class Contract extends \Eloquent {}
}

