<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
 */
class ContractFeedback extends Model
{
    //
}
