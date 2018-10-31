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
 */
	class ContractFeedback extends \Eloquent {}
}

namespace App{
/**
 * App\User
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\KycDocument[] $kycDocuments
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Proposal[] $proposals
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
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
 * App\ContactDetail
 *
 * @property int $id
 * @property int $contractor_id
 * @property string $type
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Address $address
 * @property-read \App\Contractor $contractor
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\ContactDetail onlyTrashed()
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
 * App\Proposal
 *
 * @property int $id
 * @property int $proposer_contractor_id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $description
 * @property string|null $website
 * @property string|null $source_code
 * @property string|null $proposed_value
 * @property string|null $proposed_currency
 * @property string|null $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Contractor $ProposerContractor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contract[] $contracts
 * @property-read mixed $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Invoice[] $invoices
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Payment[] $payments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\ModelStatus\Status[] $statuses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal currentStatus($names)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Proposal onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal otherCurrentStatus($names)
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereProposedCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereProposedValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereProposerContractorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereSourceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Proposal whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Proposal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Proposal withoutTrashed()
 */
	class Proposal extends \Eloquent {}
}

namespace App{
/**
 * App\Address
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
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Address onlyTrashed()
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
 * App\ContractContrator
 *
 * @property int $id
 * @property int $contract_id
 * @property int $contractor_id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractContrator whereContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractContrator whereContractorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractContrator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractContrator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractContrator whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContractContrator whereUpdatedAt($value)
 */
	class ContractContrator extends \Eloquent {}
}

namespace App{
/**
 * App\Reward
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
 * @method static \Illuminate\Database\Query\Builder|\App\Reward onlyTrashed()
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
 * App\KycDocument
 *
 * @property int $id
 * @property int $contractor_id
 * @property string $title
 * @property string $description
 * @property string $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Contractor $contractor
 * @property-read mixed $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\ModelStatus\Status[] $statuses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument currentStatus($names)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\KycDocument onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument otherCurrentStatus($names)
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereContractorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\KycDocument withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\KycDocument withoutTrashed()
 */
	class KycDocument extends \Eloquent {}
}

namespace App{
/**
 * App\Comment
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
 * @method static \Illuminate\Database\Query\Builder|\App\Comment onlyTrashed()
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
 * App\Contractor
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $logo
 * @property string|null $slug
 * @property string|null $bio
 * @property string $type
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $company_name
 * @property string|null $pasa
 * @property int $approved
 * @property string|null $approved_at
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
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor currentStatus($names)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Contractor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor otherCurrentStatus($names)
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contractor wherePasa($value)
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
 * @method static \Illuminate\Database\Query\Builder|\App\MoneyValue onlyTrashed()
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
 * App\InvoiceLine
 *
 * @property int $id
 * @property int $invoice_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Invoice $invoice
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceLine onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceLine withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceLine withoutTrashed()
 */
	class InvoiceLine extends \Eloquent {}
}

namespace App{
/**
 * App\Payment
 *
 * @property int $id
 * @property int $proposal_id
 * @property int $contractor_id
 * @property string $ophash
 * @property string $amount_value
 * @property string $amount_currency
 * @property string|null $date_apportioned
 * @property string|null $date_disbursed
 * @property string|null $date_confirmed
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Proposal $proposal
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Payment onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereAmountCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereAmountValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereContractorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDateApportioned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDateConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDateDisbursed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereOphash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereProposalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Payment withoutTrashed()
 */
	class Payment extends \Eloquent {}
}

namespace App{
/**
 * App\Invoice
 *
 * @property int $id
 * @property string $no
 * @property string $date
 * @property int $contract_id
 * @property int $contractor_id
 * @property string $ophash
 * @property string $value
 * @property string $currency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Contractor $contractor
 * @property-read mixed $status
 * @property-read \App\Proposal $proposal
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\ModelStatus\Status[] $statuses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice currentStatus($names)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Invoice onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice otherCurrentStatus($names)
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereContractorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereOphash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Invoice withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Invoice withoutTrashed()
 */
	class Invoice extends \Eloquent {}
}

namespace App{
/**
 * App\Contract
 *
 * @property int $id
 * @property int $proposal_id
 * @property string $type
 * @property string $payout_type
 * @property int $needs_feedback
 * @property \Illuminate\Support\Carbon $start
 * @property \Illuminate\Support\Carbon|null $end
 * @property string $total_value
 * @property string $total_currency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Address $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contractor[] $contractors
 * @property-read mixed $status
 * @property-read \App\Proposal $proposal
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\ModelStatus\Status[] $statuses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract currentStatus($names)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Contract onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract otherCurrentStatus($names)
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereNeedsFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract wherePayoutType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereProposalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereTotalCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereTotalValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Contract withoutTrashed()
 */
	class Contract extends \Eloquent {}
}

