<?php

namespace App\View\Components\Category;

use App\Models\Category;
use Illuminate\View\Component;

class DropdownContainer extends Component
{
    public function render()
    {
        return view('components.category.dropdown-container', [
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug',request('category'))
        ]);
    }
}