<?php

namespace App\Orchid\Screens\Gerer_Publication;

use App\Models\MyModels\Etudiant;
use App\Models\MyModels\Publication;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class Update_And_Remove_Pub extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */



    public $name = 'Update_and_Remove_Pub';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Update_and_Remove_Pub';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Publication $publication
     *
     * @return array
     */
    public function query(Publication $publication): array
    {
        $this->exists = $publication->exists;

        if($this->exists){
            $this->name = 'Edit Pub';
        }

        $publication->load('attachment');


        return [
            'Publication' => $publication
        ];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists)
                ->type(Color::SECONDARY()),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists)
                ->type(Color::SECONDARY()),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([

                Input::make('Publication.cin_publisher')
                    ->type('Integer')
                    ->required()
                    ->title('Cin Publisher')
                    ->placeholder('Cin Publisher'),



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












            ])







        ];
    }

    /**
     * @param Publication    $publication
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Publication $publication, Request $request)
    {
        $publication->fill($request->get('Publication'))->save();

        $publication->attachment()->syncWithoutDetaching(
            $request->input('Publication.attachment', [])
        );

        Alert::info('You have successfully update an Pub.');

        return redirect()->route('platform.Display_publication');
    }

    /**
     * @param Publication $publication
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Publication $publication)
    {
        $publication->delete();

        Alert::info('You have successfully deleted the Pub.');

        return redirect()->route('platform.Display_publication');
    }

    public $permission = [
        'platform.Display_publication'
    ];
}

