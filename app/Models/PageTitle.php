<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class PageTitle extends Model
{
   protected $primaryKey="page_titles_id";
   protected $fillable =['page_titles_name'];
}
