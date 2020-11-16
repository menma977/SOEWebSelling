<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sell
 * @package App\Models
 * @property integer id
 * @property integer product
 * @property string description
 * @property integer debit
 * @property  integer credit
 */
class Sell extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'product',
    'description',
    'debit',
    'credit',
  ];
}
