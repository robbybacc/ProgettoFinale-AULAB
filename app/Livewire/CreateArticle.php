<!--  

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticle extends Component
{
    use WithFileUploads;

    #[Validate('required', message: 'Questo campo è obbligatorio')]
    #[Validate('min:5', message: 'Il titolo è corto')]
    public $titolo;
    #[Validate('required', message: 'Questo campo è obbligatorio')]
    #[Validate('min:5', message: 'Il Sottotitolo è corto')]
    public $sottotitolo;
    #[Validate('required', message: 'Questo campo è obbligatorio')]
    public $body;
    #[Validate('required', message: 'Questo campo è obbligatorio')]
    public $img;

    public function createArticle(){
        $this->validate();
        Auth::user()->articles()->create([
            'titolo' => $this->titolo,
            'sottotitolo' => $this->sottotitolo,
            'body' => $this->body,
            'img' => $this->img->store('public/article'),
        ]);

        
        $this->reset();
        session()->flash('message', 'Articolo pubblicato con successo!');
        // return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.create-article');
    }
}  -->
