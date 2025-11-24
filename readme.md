
# UTS BASIS DATA


### Model

* Rumah Sakit
* Poliklinik
* Dokter
* Jadwal Praktek
* Pasien
* Kunjungan
* Obat
* Resep
* User


## Struktur project

```
├── docker-compose.yml
├── src
│   ├── artisan
│   ├── composer.json
│   ├── vite.config.js
│   ├── app
│   │   ├── Providers
│   │   │   ├── AppServiceProvider.php
│   │   │   └── Filament
│   │   │       └── AdminPanelProvider.php
│   │   ├── Filament
│   │   │   ├── Admin 
│   │   │   │   ├── Resources
│   │   │   │   │   ├── KunjunganResource.php
│   │   │   │   │   ├── JadwalPraktekResource.php
│   │   │   │   │   ├── PoliklinikResource.php
│   │   │   │   │   ├── ResepResource.php
│   │   │   │   │   ├── ObatResource.php
│   │   │   │   │   ├── PasienResource.php
│   │   │   │   │   └── RumahSakitResource.php
│   │   ├── Models
│   ├── database 
│   │   ├── migrations
│   │   │   ├── 2025_11_16_002710_create_obats_table.php
│   │   │   └── 2025_11_16_002943_create_reseps_table.php
│   ├── resources
│   └── ...
├── ...
```


## Membuat Project

```bash
cd ~/boilerplate
./start.sh uts-basisdata
```


## CLI

```bash
dcu : untuk docker-compose up -d
dcd : untuk docker-compose down
dcm Model : untuk create model, controller, seeder, migration, filament resource
dci : untuk project init dimana sudah termasuk migrate, seed, fresh
dcr Model : untuk model, controller, seeder, migration, filament resource
dcp message : untuk git add, git commit dan git push
dca make:middleware Middleware : dca untuk php artisan

```


# Contoh Result CLI

## Migration

```php
 public function up(): void
    {
        Schema::create('rumah_sakits', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rs', 20)->unique();
            $table->string('nama');
            $table->string('kelas_rs')->nullable();
            $table->string('akreditasi')->nullable();
            $table->string('penyelenggara');
            $table->text('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->json('fasilitas')->nullable();
            $table->timestamps();
        });
    }
```


## Model

```php
    class RumahSakit extends Model
    {
        use HasFactory;

        protected $guarded = [];

        public function poliklinik()
        {
            return $this->hasMany(Poliklinik::class, 'id_rumah_sakit');
        }
    }
```


## Controller 

```php
    class RumahSakitController extends Controller
    {
        //
    }
```


## Resource Filament (List)

```php
    class ListRumahSakits extends ListRecords
    {
        protected static string $resource = RumahSakitResource::class;

        protected function getHeaderActions(): array
        {
            return [
                Actions\CreateAction::make(),
            ];
        }
    }
```

# Contoh Membuat Factory

```php
    class RumahSakitFactory extends Factory
    {
        public function definition(): array
        {
            return [
                'kode_rs' => 'RS-' . $this->faker->unique()->numerify('#####'),
                'nama' => $this->faker->company . ' Hospital',
                'kelas_rs' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
                'akreditasi' => $this->faker->randomElement(['Paripurna', 'Utama', 'Madya', 'Dasar']),
                'penyelenggara' => $this->faker->randomElement(['Pemerintah', 'Swasta', 'TNI', 'Polri']),
                'alamat' => $this->faker->address,
                'kota' => $this->faker->city,
                'provinsi' => $this->faker->state,
                'kode_pos' => $this->faker->postcode,
                'telepon' => $this->faker->phoneNumber,
                'email' => $this->faker->safeEmail,
                'website' => $this->faker->domainName,
                'fasilitas' => json_encode([
                    'igd' => $this->faker->boolean,
                    'icu' => $this->faker->boolean,
                    'rawat_inap' => $this->faker->boolean,
                    'farmasi' => $this->faker->boolean,
                ]),
            ];
        }
    }
```

# Contoh menggunakan Factory

```php
    RumahSakit::factory(5)->create();
```


## Langkah Terakhir : Update Data DB & Update Resource Filament

```bash
dci
dcm Model (Setiap model yg sudah dibuat melakukan dcm kembali)

cek website project : uts-basisdata.test
```
