<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('featured')->default(false);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('location')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('summary', 300)->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('map_zoom_level')->default(2);
            $table->foreignId('seo_id')->nullable()->constrained('seo')->cascadeOnDelete();
            $table->foreignId('media_logo_id')->nullable()->constrained('media')->cascadeOnDelete();
            $table->foreignId('media_header_image_id')->nullable()->constrained('media')->cascadeOnDelete();
            $table->timestamps();
        });

        // Insert Dummy Locations
        $locations = ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Philadelphia', 'San Antonio', 'San Diego', 'Dallas', 'San Jose', 'Austin', 'Jacksonville', 'Fort Worth', 'Columbus', 'Charlotte', 'San Francisco', 'Indianapolis', 'Seattle', 'Denver', 'Washington', 'Boston', 'El Paso', 'Nashville', 'Detroit', 'Oklahoma City', 'Portland', 'Las Vegas', 'Memphis', 'Louisville', 'Baltimore', 'Milwaukee', 'Albuquerque', 'Tucson', 'Fresno', 'Mesa', 'Sacramento', 'Atlanta', 'Kansas City', 'Colorado Springs', 'Miami', 'Raleigh', 'Omaha', 'Long Beach', 'Virginia Beach', 'Oakland', 'Minneapolis', 'Tulsa', 'Tampa', 'Arlington', 'New Orleans', 'Wichita', 'Cleveland', 'Bakersfield', 'Aurora', 'Anaheim', 'Honolulu', 'Santa Ana', 'Riverside', 'Corpus Christi', 'Lexington', 'Stockton', 'Henderson', 'Saint Paul', 'St. Louis', 'Cincinnati', 'Pittsburgh', 'Greensboro', 'Anchorage', 'Plano', 'Lincoln', 'Orlando', 'Irvine', 'Newark', 'Durham', 'Chula Vista', 'Toledo', 'Fort Wayne', 'St. Petersburg', 'Laredo', 'Jersey City', 'Chandler', 'Madison', 'Lubbock', 'Scottsdale', 'Reno', 'Buffalo', 'Gilbert', 'Glendale', 'North Las Vegas', 'Winston–Salem', 'Chesapeake', 'Norfolk', 'Fremont', 'Garland', 'Irving', 'Hialeah', 'Richmond', 'Boise', 'Spokane', 'Baton Rouge', 'Tacoma', 'San Bernardino', 'Modesto', 'Fontana', 'Des Moines', 'Moreno Valley', 'Santa Clarita', 'Fayetteville', 'Birmingham', 'Oxnard', 'Rochester', 'Port St. Lucie', 'Grand Rapids', 'Huntsville', 'Salt Lake City', 'Frisco', 'Yonkers', 'Amarillo', 'Glendale', 'Huntington Beach', 'McKinney', 'Montgomery', 'Augusta', 'Aurora', 'Akron', 'Little Rock', 'Tempe', 'Columbus', 'Overland Park', 'Grand Prairie', 'Tallahassee', 'Cape Coral', 'Mobile', 'Knoxville', 'Shreveport', 'Worcester', 'Ontario', 'Vancouver', 'Sioux Falls', 'Chattanooga', 'Brownsville', 'Fort Lauderdale', 'Providence', 'Newport News', 'Rancho Cucamonga', 'Santa Rosa', 'Peoria', 'Oceanside', 'Elk Grove', 'Salem', 'Pembroke Pines', 'Eugene', 'Garden Grove', 'Cary', 'Fort Collins', 'Corona', 'Springfield', 'Jackson', 'Alexandria', 'Hayward', 'Clarksville', 'Lakewood', 'Lancaster', 'Salinas', 'Palmdale', 'Hollywood', 'Springfield', 'Macon', 'Kansas City', 'Sunnyvale', 'Pomona', 'Killeen', 'Escondido', 'Pasadena', 'Naperville', 'Bellevue', 'Joliet', 'Murrieta', 'Midland', 'Rockford', 'Paterson', 'Savannah', 'Bridgeport', 'Torrance', 'McAllen', 'Syracuse', 'Surprise', 'Denton', 'Roseville', 'Thornton', 'Miramar', 'Pasadena', 'Mesquite', 'Olathe', 'Dayton', 'Carrollton', 'Waco', 'Orange', 'Fullerton', 'Charleston', 'West Valley City', 'Visalia', 'Hampton', 'Gainesville', 'Warren', 'Coral Springs', 'Cedar Rapids', 'Round Rock', 'Sterling Heights', 'Kent', 'Columbia', 'Santa Clara', 'New Haven', 'Stamford', 'Concord', 'Elizabeth', 'Athens', 'Thousand Oaks', 'Lafayette', 'Simi Valley', 'Topeka', 'Norman', 'Fargo', 'Wilmington', 'Abilene', 'Odessa', 'Columbia', 'Pearland', 'Victorville'];

        $records = [];
        foreach ($locations as $location) {
            $records[] = [
                'name' => $location . rand(101, 999),
                'slug' => Str::slug($location . rand(101, 999)),
                'featured' => false,
                'parent_id' => null,
                'summary' => null,
                'description' => null,
                'longitude' => null,
                'latitude' => null,
                'map_zoom_level' => 2,
                'seo_id' => null,
                'media_logo_id' => null,
                'media_header_image_id' => null,
            ];
        }
        DB::table('location')->insert($records);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location');
    }
};
