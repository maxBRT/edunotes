<?php

namespace App\Livewire;

use App\Models\SchoolClass;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteClassModal extends Component
{
    public bool $showModal = false;

    public int $classId;

    public string $className;


    #[On('openDeleteModal')]
    public function open(): void
    {
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function deleteClass()
    {
        if ($this->classId) {
            $schoolClass = SchoolClass::findOrFail($this->classId);
            $schoolClass->delete();

            $this->closeModal();
            $this->dispatch('classDeleted');

            return redirect()->route('dashboard');
        }

        return null;
    }

    public function mount(int $classId, string $className): void
    {
        $this->classId = $classId;
        $this->className = $className;
    }

    public function render()
    {
        return view('livewire.delete-class-modal');
    }
}
