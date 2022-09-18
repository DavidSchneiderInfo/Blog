<?php

namespace App\Http\Livewire\Profile;

use App\Services\ProfileImportService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImportData extends Component
{
    use WithFileUploads;

    public $importData;

    public function render()
    {
        return view('livewire.profile.import-data');
    }

    public function save()
    {
        $this->validate([
            'importData' => 'file|mimes:json', // 10MB Max
        ]);
        $user = Auth::user();
        $file = $this->importData->storeAs('imports', $user->id.'.json');
        $data = json_decode(
            file_get_contents(
                storage_path('app/'.$file)
            ),
            true
        );

        try {
            $service = new ProfileImportService();
            $service->runImport($user, $data);

            $this->emit('profileImportSuccess');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
