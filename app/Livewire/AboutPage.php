<?php

namespace App\Livewire;

use App\Enums\ProjectType;
use App\Models\Project;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('About Kyrian Obikwelu')]
class AboutPage extends Component
{
    public function render(): View
    {
        $regularProjects = Project::where('type', ProjectType::REGULAR)->get();
        $openSourceProjects = Project::where('type', ProjectType::OPEN_SOURCE)->get();

        return view('livewire.about-page', compact('regularProjects', 'openSourceProjects'));
    }
}
