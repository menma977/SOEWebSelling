<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @property integer id
 * @property string img
 * @property string name
 * @property integer debit
 * @property integer credit
 * @property string description
 * @property integer sub_category
 * @property integer supplier
 */
class Product extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'img',
    'name',
    'debit',
    'credit',
    'description',
    'sub_category',
    'supplier',
  ];
}
