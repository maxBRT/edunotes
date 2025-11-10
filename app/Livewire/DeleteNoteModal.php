<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteNoteModal extends Component
{
    public bool $showModal = false;

    public int $noteId;

    public string $noteTitle;

    #[On('openDeleteModal')]
    public function open(): void
    {
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function deleteNote()
    {
        if ($this->noteId) {
            $note = Note::findOrFail($this->noteId);
            $note->delete();

            $this->closeModal();

            return redirect()->route('schoolclasses.show', $note->school_class_id)
                ->with('success', 'Note deleted successfully!');
        }

        return null;
    }

    public function mount(int $noteId, string $noteTitle): void
    {
        $this->noteId = $noteId;
        $this->noteTitle = $noteTitle;
    }

    public function render()
    {
        return view('livewire.delete-note-modal');
    }
}
