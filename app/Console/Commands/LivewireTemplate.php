<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Attribute\AsCommand;
use function Laravel\Prompts\text;
use function Laravel\Prompts\select;

#[AsCommand(name: 'livewire:template')]
class LivewireTemplate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'livewire:template';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new livewire template';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // build a path
        $name = text(
            label: "This is the name of the template?",
            placeholder: "E.g. DiscussionForm",
            hint: "This command generates livewire form templates"
        );

        $model_list = $this->getModelList();
        $model_to_use_index = select(
            label: 'What model should be used?',
            options: $model_list,
        );
        $model_to_use = $model_list[$model_to_use_index];

        $snake_name = str($name)->snake("-")->lower();
        $full_component_path = app_path("Livewire/{$name}.php");
        $full_view_path = resource_path("views/livewire/$snake_name.blade.php");

        if (File::exists($full_view_path)) {
            $this->error("$full_view_path already exists");
        }

        if (File::exists($full_component_path)) {
            $this->error("$full_component_path already exists");
        }

        $fields = $this->getFields($model_to_use);
        $field_list = $this->generateFieldList($fields);
        $field_data = $this->generateFieldData($fields);
        $field_validation = $this->generateFieldValidation($fields);

        $file_content = str(file_get_contents(app_path("Console/Commands/stubs/livewire-form.stub")))
            ->replace("{field_list}", $field_list)
            ->replace("{field_validation}", $field_validation)
            ->replace("{field_data}", $field_data)
            ->replace("{model_to_use}", $model_to_use)
            ->replace("{model_to_use_lower}", strtolower($model_to_use));

        file_put_contents($full_component_path, $file_content);
        file_put_contents($full_view_path, "<div>DERP</div>");

    }

    private function getModelList() : array
    {
        $models = collect(File::allFiles(app_path('Models')))
            ->map(function ($file) {
                return str($file->getRelativePathname())->replace('.php', '')->toString();
            })
            ->toArray();
        $key = array_search("Base", $models);
        unset($models[$key]);
        return $models;
    }

    private function getFields(string $model_to_use) {
        $instance = resolve('App\\Models\\'.$model_to_use);
        return($instance->fillable);
    }

    private function generateFieldList($fields) : string
    {
        return collect($fields)->map(function ($field) {
            return "public \$$field;";
        })->implode("\n");
    }

    private function generateFieldData($fields) : string
    {
        return collect($fields)->map(function ($field) {
            return "'\$$field' => \$this->$field,";
        })->implode("\n");
    }

    private function generateFieldValidation($fields) : string
    {
        return collect($fields)->map(function ($field) {
            return "'\$$field' => 'required',";
        })->implode("\n");
    }
}
