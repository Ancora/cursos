<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    /* protected $paginationTheme = 'bootstrap'; */

    public $category_id;
    public $level_id;
    public $user_id;

    public function render()
    {
        $categories = Category::all()->sortBy('name');
        $levels = Level::all();
        $users = User::all();

        $courses = Course::where('status', 3)
                        ->category($this->category_id)
                        ->level($this->level_id)
                        ->user($this->user_id)
                        ->latest('id')
                        ->paginate(8);

        return view('livewire.courses-index', compact('courses', 'categories', 'levels', 'users'));
    }

    public function resetFilters() {
        $this->reset([
            'category_id',
            'level_id',
            'user_id',
        ]);
    }
}
