<?php

namespace App\Livewire;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SearchBar extends Component
{
    public $search = '';

    public function render()
    {
        $notes = [];

        if (strlen($this->search) >= 1) {
            $userSchoolClassIds = Auth::user()->schoolClasses()->pluck('id');

            $notes = Note::search($this->search)
                ->query(fn ($builder) => $builder->whereIn('school_class_id', $userSchoolClassIds))
                ->get();
        }

        return view('livewire.search-bar', ['notes' => $notes]);
    }
}
