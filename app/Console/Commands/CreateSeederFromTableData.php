<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CreateSeederFromTableData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'extract:table {tablename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create seeder from table data';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Throwable
     */
    public function handle()
    {
        $tablename = $this->argument('tablename');

        throw_if(Schema::hasTable("'$tablename'"), new NotFoundHttpException("Table $tablename was not found."));

        $name = str($tablename)->singular()->studly().'TableSeeder';
        $file = base_path('database/seeders/'.$name.'.php');

        throw_if(File::exists($file), new NotFoundHttpException('File already exists'));

        file_put_contents($file, "<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class $name extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('$tablename')->delete();

        DB::table('$tablename')->insert([".PHP_EOL);

        DB::table($tablename)
            ->orderBy(Schema::getColumnListing($tablename)[0])
            ->chunk(500, fn (Collection $items) => $items->each(function ($array) use ($file) {
                $lines = '            ['.PHP_EOL;
                foreach ($array as $key => $value) {
                    if (is_string($value)) {
                        $line = addslashes($value);
                        $lines .= "                '$key' => '$line',".PHP_EOL;
                    } elseif (is_null($value)) {
                        $lines .= "                '$key' => null,".PHP_EOL;
                    } else {
                        $lines .= "                '$key' => $value,".PHP_EOL;
                    }
                }
                $lines .= '            ],'.PHP_EOL;

                file_put_contents($file, $lines, FILE_APPEND | LOCK_EX);
            }));

        $endofline = PHP_EOL;
        file_put_contents($file, "        ]);$endofline    }$endofline}", FILE_APPEND | LOCK_EX);

        $this->components->info("Created a seed file from table {$tablename}");
    }
}
