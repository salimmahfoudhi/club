<?php

namespace App\Orchid\Screens\Gerer_Publication;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use App\Models\MyModels\Publication;
use App\Models\MyModels\Etudiant;

use Illuminate\Http\Request;

use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;


use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\TextArea;

class Add_publication extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Add publication';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Add publication';

    /**
     * Query data.
     *
     * @return array
     */
    public $exists = false;


    public function query(Publication $publication): array
    {
        $this->exists = $publication->exists;

        if($this->exists){
            $this->name = 'Addclub';
        }

        return [
            'Publication' => $publication
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([

                Input::make('Publication.id_publisher')
                    ->type('Integer')
                    ->required()
                    ->title('Id Publisher')
                    ->placeholder('Id Publisher'),



                Select::make('Publication.type')
                    ->required()
                    ->options([
                        'Evenement' => 'Evenement',
                        'Formation'   => 'Formation',

                    ])
                    ->title('Select type'),


                Cropper::make('Publication.banner')
                    ->targetRelativeUrl()
                    ->title('Large web banner image')
                    ->required()
                    ->width(1500)
                    ->height(600),



                TextArea::make('Publication.description')
                    ->type('text')
                    ->required()
                    ->title('Description')
                    ->placeholder('Description'),


                Button::make('Add Publication')
                    ->icon('check')
                    ->method('addnewPublication')
                    ->canSee(!$this->exists)
                    ->type(Color::SECONDARY()),









                ])







        ];
    }



    public function addnewPublication(Publication $publication, Request $request)
    {
        $publication->fill($request->get('Publication'))->save(); //Publication esm model

        Alert::info('You have successfully Add publication.');

        return redirect()->route('platform.Add_publication');
    }
}
