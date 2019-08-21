<?php

namespace App\Models;

class NavigationDashboard extends IronsideDashboardNavigation
{
    /**
     * Get the roles.
     *
     * @return \Eloquent
     */
    public $translatable = [
      'title',
      'description',
      'help_index_title',
      'help_index_content',
      'help_create_title',
      'help_create_content',
      'help_edit_title',
      'help_edit_content',
    ];

    // protected $casts = [
    //   'title' => 'array',
    //   'description' => 'array',
    //   'slug' => 'array',
    //   'url' => 'array',
    //   'help_index_title' => 'array',
    //   'help_index_content' => 'array',
    //   'help_create_title' => 'array',
    //   'help_create_content' => 'array',
    //   'help_edit_title' => 'array',
    //   'help_edit_content' => 'array',
    // ];

//    public function roles()
//    {
//        return $this->belongsToMany(\App\Role::class)->withTimestamps();
//    }
    // public function getSlugAttribute($value)
    // {
    //   return json_decode($value);
    // }

    public function getRolesStringAttribute()
    {
        return implode(', ', $this->roles()->get()->pluck('name', 'id')->toArray());
    }

    /**
     * Get a the title + url concatenated.
     *
     * @return string
     */
    public function getTitleUrlAttribute()
    {
        $name = $this->attributes['title'].' ( '.$this->attributes['url'].' )';
        if ($this->parent) {
            $name .= " - {$this->parent->title}";
        }

        return $name;
    }

    /**
     * Get all the rows as an array (ready for dropdowns).
     *
     * @return array
     */
    public static function getAllLists()
    {
        return self::with('parent')->orderBy('title')->get()->pluck('title_url', 'id')->toArray();
    }
}
