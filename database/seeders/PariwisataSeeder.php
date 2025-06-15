<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use App\Models\Pariwisata;
use App\Models\JenisWisata;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PariwisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Pantai Nambo',
                'jenis' => 'Alam',
                'kecamatan' => 'Nambo',
                'alamat' => 'Kelurahan Nambo Kecamatan Nambo Kota Kendari',
                'latitude' => -4.000472,
                'longitude' => 122.617694,
                'deskripsi' => 'Pantai Nambo merupakan objek wisata andalan di Provinsi Sulawesi Tenggara. Pantai ini terletak di Kecamatan Abeli, kurang lebih 12 kilometer dari pusat Kota Kendari. Pantai berpasir putih nan halus di sepanjang bibir pantai dengan kondisi yang landai ini menjadi salah satu objek wisata favorit di Kota Kendari yang banyak dikunjungi oleh wisatawan. Tidak hanya wisatawan lokal, seringkali wisatawan asing juga singgah dan menikmati keindahan pantai ini.',
                'rating' => 4.1,
            ],
            [
                'nama' => 'Kendari Water Front City',
                'jenis' => 'Multifungsi (rekreasi, budaya, kuliner)',
                'kecamatan' => 'Abeli',
                'alamat' => 'Petoaha, Kecamatan Abeli, Kota Kendari',
                'latitude' => -3.984988,
                'longitude' => 122.603929,
                'deskripsi' => 'Kendari Waterfront City adalah inisiatif pengembangan kawasan pesisir yang bertujuan mengubah Teluk Kendari menjadi pusat pertumbuhan ekonomi, pariwisata, dan ruang publik yang berkelanjutan. Proyek ini mencerminkan upaya revitalisasi kota dengan memanfaatkan potensi geografis dan budaya lokal.',
                'rating' => 4.0,
            ],
            [
                'nama' => 'Wisata Anjungan Teluk Kendari',
                'jenis' => 'Multifungsi (Kuliner, Rekreasi, Hiburan)',
                'kecamatan' => 'Kendari Barat',
                'alamat' => 'Tipulu, Kec. Kendari Bar Kota Kendari',
                'latitude' => -3.967718,
                'longitude' => 122.552394,
                'deskripsi' => 'Anjungan Teluk Kendari (ATK) merupakan destinasi wisata modern yang terletak di Jalan Ir. H. Alala, Tipulu, Kecamatan Kendari Barat, Sulawesi Tenggara. Tempat ini menawarkan berbagai wahana hiburan, fasilitas kuliner, dan pemandangan indah Teluk Kendari, menjadikannya pilihan ideal untuk rekreasi keluarga maupun wisatawan.',
                'rating' => 4.3,
            ],
            [
                'nama' => 'Masjid Al-Alam',
                'jenis' => 'Religi',
                'kecamatan' => 'Kambu',
                'alamat' => 'Masjid Al Alam, Jalan Lalolara, Kambu, Kota Kendari',
                'latitude' => -3.978000,
                'longitude' => 122.544544,
                'deskripsi' => 'Masjid Al-Alam adalah ikon religius dan arsitektural yang terletak di Teluk Kendari, Sulawesi Tenggara. Dikenal sebagai "masjid terapung", masjid ini berdiri megah di atas pulau buatan seluas sekitar 12.692 meter persegi, berjarak sekitar 1,5 km dari bibir pantai. Dibangun mulai tahun 2010 dan diresmikan pada 2018, masjid ini menjadi salah satu destinasi wisata religi utama di Kendari.',
                'rating' => 4.7,
            ],
            [
                'nama' => 'Tugu Religi Sultra',
                'jenis' => 'Religi',
                'kecamatan' => 'Mandonga',
                'alamat' => 'Korumba Kecamatan Mandonga Kota Kendari',
                'latitude' => -3.975573,
                'longitude' => 122.517203,
                'deskripsi' => 'Tugu Religi Sulawesi Tenggara, juga dikenal sebagai Tugu MTQ atau Tugu Persatuan, merupakan salah satu ikon monumental di Kota Kendari. Menjulang setinggi 99 meter, tinggi tugu ini melambangkan Asmaul Husna, yaitu 99 nama indah Allah dalam Islam. Desainnya dirancang oleh arsitek Danny Pomanto, yang kemudian menjadi Wali Kota Makassar. Tugu ini ditopang oleh empat pilar yang melambangkan empat kabupaten pertama di Sulawesi Tenggara: Kendari, Buton, Muna, dan Kolaka. Empat pilar tersebut disusun dalam posisi yang menyerupai posisi berdoa dalam Islam, menghasilkan "mutiara persatuan" di bagian atas tugu.',
                'rating' => 4.2,
            ],
            [
                'nama' => 'Museum Negeri Provinsi Sulawesi Tenggara',
                'jenis' => 'Edukasi dan Budaya',
                'kecamatan' => 'Kadia',
                'alamat' => 'Bende, Kecamatan Kadia, Kota Kendari',
                'latitude' => -3.9770568959666885,
                'longitude' => 122.51775032301445,
                'deskripsi' => 'Museum Negeri Provinsi Sulawesi Tenggara adalah destinasi wisata edukatif dan budaya yang terletak di Jalan Abunawas No. 191, Kelurahan Bende, Kecamatan Kadia, Kota Kendari. Museum ini menyimpan lebih dari 7.000 koleksi benda bersejarah yang terbagi dalam sepuluh ruang tematik, mencakup berbagai aspek kehidupan dan sejarah masyarakat Sulawesi Tenggara.',
                'rating' => 4.3,
            ],
            [
                'nama' => 'Kolam Retensi Boulevard & Sarana Olahraga',
                'jenis' => 'Sarana Olahraga',
                'kecamatan' => 'Baruga',
                'alamat' => 'Lepo-Lepo, Kec. Baruga, Kota Kendari, Sulawesi Tenggara',
                'latitude' => -4.033340945713470,
                'longitude' => 122.5097026730150,
                'deskripsi' => 'Sejak diresmikan pada tahun 2021, Kolam Retensi Boulevard telah menjadi destinasi populer bagi warga untuk berolahraga dan berekreasi. Fasilitas seperti jogging track, area senam, dan taman yang rindang menarik pengunjung dari berbagai kalangan untuk beraktivitas fisik atau sekadar menikmati suasana. Selain itu, area sekitar kolam dipenuhi pedagang yang menjajakan berbagai kuliner lokal, menambah daya tarik tempat ini sebagai ruang sosial dan wisata',
                'rating' => 4.5,
            ],
            [
                'nama' => 'Kebun Raya Kendari',
                'jenis' => 'Alam',
                'kecamatan' => 'Poasia',
                'alamat' => 'Jalan Kebun Raya Nanga-Nanga, Anduonohu, Kec. Poasia, Kota Kendari',
                'latitude' => -4.047921,
                'longitude' => 122.577243,
                'deskripsi' => 'Kebun Raya Kendari adalah destinasi wisata alam, edukasi, dan konservasi yang terletak di Jalan Kebun Raya Nanga-Nanga, Kelurahan Anduonohu, Kecamatan Poasia, Kota Kendari, Sulawesi Tenggara. Berjarak sekitar 12 kilometer dari pusat kota, kebun raya ini dapat dicapai dalam waktu sekitar 30 menit berkendara.',
                'rating' => 4.4,
            ],
            [
                'nama' => 'Air Terjun Nanga Nanga',
                'jenis' => 'Wisata Alam',
                'kecamatan' => 'Poasia',
                'alamat' => 'Anduonohu, Kec. Poasia, Kota Kendari, Sulawesi Tenggara 93234',
                'latitude' => -4.055795146128040,
                'longitude' => 122.56261310120500,
                'deskripsi' => 'Air Terjun Nanga-Nanga adalah destinasi wisata alam yang terletak di Kecamatan Kambu, Kota Kendari, Sulawesi Tenggara. Air terjun ini memiliki ketinggian sekitar 5 meter dan dikelilingi oleh pepohonan besar serta bebatuan coklat kehitaman, menciptakan suasana yang sejuk dan alami.',
                'rating' => 4.4,
            ],
            [
                'nama' => 'Wisata Kali Biru',
                'jenis' => 'Wisata Alam',
                'kecamatan' => 'Nambo',
                'alamat' => 'Bungkutoko, Kota Kendari, Sulawesi Tenggara 93234',
                'latitude' => -3.986889490553400,
                'longitude' => 122.61821554540900,
                'deskripsi' => 'Kali Biru Kendari adalah destinasi wisata alam yang terletak di Kelurahan Bungkutoko, Kecamatan Nambo, Kota Kendari, Sulawesi Tenggara. Dikenal karena kejernihan airnya yang memancarkan warna biru alami, tempat ini menjadi pilihan populer bagi warga lokal untuk berenang dan bersantai tanpa biaya masuk.',
                'rating' => 4.2,
            ],
            [
                'nama' => 'Mantara Waterpark Kendari',
                'jenis' => 'Wisata Buatan/Rekreasi',
                'kecamatan' => 'Puuwatu',
                'alamat' => 'Abeli Dalam, Kec. Puuwatu, Kota Kendari, Sulawesi Tenggara',
                'latitude' => -3.978298758253780,
                'longitude' => 122.45554048664900,
                'deskripsi' => 'Mantara Waterpark adalah destinasi wisata air keluarga yang terletak di Jalan Sarano Puuwatu, Kelurahan Abeli Dalam, Kecamatan Puuwatu, Kota Kendari, Sulawesi Tenggara. Dengan mengusung konsep perpaduan budaya Bali dan Tolaki, tempat ini menawarkan suasana tropis yang unik dan estetika khas yang memikat',
                'rating' => 4.4,
            ],
            [
                'nama' => 'Puncak Amarilis',
                'jenis' => 'Alam',
                'kecamatan' => 'Kendari Barat',
                'alamat' => 'Watu-Watu, Kecamatan Kendari Barat , Kota Kendari',
                'latitude' => -3.941331,
                'longitude' => 122.540249,
                'deskripsi' => 'Puncak Amarilis di Kota Kendari merupakan destinasi wisata alam yang populer, terutama di kalangan anak muda dan pecinta alam. Terletak di Kelurahan Watu-Watu, Kecamatan Kendari Barat, Sulawesi Tenggara, tempat ini menawarkan pengalaman mendaki yang menyegarkan dengan pemandangan menakjubkan dari ketinggian. Dengan pemandangan yang menakjubkan dan suasana yang tenang, tempat ini cocok untuk melepas penat dari rutinitas sehari-hari.',
                'rating' => 4.5,
            ],
            [
                'nama' => 'Taman Kota Kendari',
                'jenis' => 'Sarana Publik',
                'kecamatan' => 'Mandonga',
                'alamat' => 'Mandonga, Kec. Mandonga, Kota Kendari, Sulawesi Tenggara 93111',
                'latitude' => -3.9661283875908600,
                'longitude' => 122.51435382361900,
                'deskripsi' => 'Taman Kota Kendari adalah ruang terbuka hijau yang terletak di pusat Kota Kendari, tepatnya di depan Kantor Wali Kota, Kecamatan Mandonga. Dengan luas sekitar 5 hektar, taman ini menawarkan suasana asri dan sejuk berkat pepohonan rindang yang tersebar di seluruh area',
                'rating' => 4.3,
            ],
            [
                'nama' => 'Taman Bakau Kendari',
                'jenis' => 'Wisata Alam',
                'kecamatan' => 'Kendari Barat',
                'alamat' => 'Lahundape, Kec. Kendari Bar., Kota Kendari, Sulawesi Tenggara 93121',
                'latitude' => -3.9644602816438300,
                'longitude' => 122.5286685732100,
                'deskripsi' => 'Taman Bakau Kendari adalah destinasi wisata alam yang terletak di Kelurahan Lahundape, Kecamatan Kendari Barat, Kota Kendari, Sulawesi Tenggara. Taman ini menawarkan pengalaman menyusuri hutan mangrove yang asri, menjadikannya tempat ideal untuk edukasi lingkungan dan rekreasi keluarga',
                'rating' => 4.4,
            ],
            [
                'nama' => 'Kendari Water Sport 1',
                'jenis' => 'Alam',
                'kecamatan' => 'Kendari Barat',
                'alamat' => 'Tipulu, Kecamatan Kendari Barat, Kota Kendari',
                'latitude' => -3.966647,
                'longitude' => 122.548971,
                'deskripsi' => 'Kendari Water Sport adalah destinasi wisata yang terletak di Jalan Ir. H. Alala, Kelurahan Tipulu, Kecamatan Kendari Barat, Kota Kendari, Sulawesi Tenggara. Tempat ini menawarkan berbagai aktivitas rekreasi yang cocok untuk keluarga dan masyarakat umum.',
                'rating' => 4.1,
            ],
            [
                'nama' => 'Batu Batu',
                'jenis' => 'Wisata Buatan/Rekreasi',
                'kecamatan' => 'Poasia',
                'alamat' => 'Anduonohu, Kec. Poasia, Kota Kendari, Sulawesi Tenggara 93231',
                'latitude' => -3.9812460411514,
                'longitude' => 122.53450870705200,
                'deskripsi' => 'Batbat Kendari, atau yang dikenal sebagai Batu-Batu, adalah salah satu spot nongkrong populer di Kota Kendari, Sulawesi Tenggara. Terletak di Jalan Masjid Al-Alam, kawasan ini merupakan jalan penghubung antara Kecamatan Kambu dan area Masjid Al-Alam Kendari. Batbat terbentuk dari tumpukan batu yang dibuat untuk akses jalan menuju Masjid Al-Alam, dan lokasinya yang berada di pinggir laut menjadikannya tempat favorit untuk menikmati pemandangan Teluk Kendari, terutama saat matahari terbenam.',
                'rating' => 4.3,
            ],
            [
                'nama' => 'Kendari Beach',
                'jenis' => 'Alam/Rekreasi',
                'kecamatan' => 'Kendari Barat',
                'alamat' => 'Punggaloba, Kecamatan Kendari Barat, Kota Kendari',
                'latitude' => -3.967097,
                'longitude' => 122.558992,
                'deskripsi' => 'Kendari Beach, juga dikenal sebagai Kebi, adalah salah satu destinasi wisata pantai yang populer di Kota Kendari, Sulawesi Tenggara. Terletak di Jalan Sultan Hasanuddin No. 27, Kelurahan Punggaloba, Kecamatan Kendari Barat, pantai ini mudah diakses dari pusat kota dan menjadi tempat favorit untuk bersantai, terutama pada sore dan malam hari.',
                'rating' => 4.5,
            ],
            [
                'nama' => 'Air Terjun Lasolo',
                'jenis' => 'Wisata Alam',
                'kecamatan' => 'Kendari Barat',
                'alamat' => 'Sanua, Kendari Barat, Kendari City, South East Sulawesi`',
                'latitude' => -3.9535035404758900,
                'longitude' => 122.57622241744300,
                'deskripsi' => 'Air Terjun Lasolo adalah destinasi wisata alam tersembunyi yang terletak di Jalan Lasolo, Kelurahan Sodoha, Kecamatan Kendari Barat, Kota Kendari, Sulawesi Tenggara. Berada di tengah hutan kota, air terjun ini menawarkan suasana asri dan udara sejuk, menjadikannya tempat ideal untuk relaksasi dan menikmati keindahan alam.',
                'rating' => 4.3,
            ],
            [
                'nama' => 'Papalimba Water Tourism Lapulu',
                'jenis' => 'Wisata Buatan/Rekreasi',
                'kecamatan' => 'Abeli',
                'alamat' => 'Lapulu, Kec. Abeli, Kota Kendari, Sulawesi Tenggara',
                'latitude' => -3.974910196809340,
                'longitude' => 122.57937939698500,
                'deskripsi' => 'Papalimba Water Tourism Lapulu adalah destinasi wisata pesisir yang terletak di Kelurahan Lapulu, Kecamatan Abeli, Kota Kendari, Sulawesi Tenggara. Kawasan ini sebelumnya merupakan pemukiman kumuh, namun telah diubah menjadi ruang terbuka hijau yang ramah lingkungan dan menarik bagi wisatawan.',
                'rating' => 4.3,
            ],
            [
                'nama' => 'Museum Pusat Informasi Kebudayaan Sultra',
                'jenis' => 'Edukasi dan Budaya',
                'kecamatan' => 'Mandonga',
                'alamat' => 'Korumba, Kec. Mandonga, Kota Kendari',
                'latitude' => -3.977801023566230,
                'longitude' => 122.52495735930300,
                'deskripsi' => 'Museum Pusat Informasi Kebudayaan Sultra adalah destinasi wisata edukatif yang menampilkan kekayaan sejarah dan budaya Sulawesi Tenggara. Museum ini terletak di Jalan Abunawas No. 191, Kelurahan Bende, Kecamatan Kadia, Kota Kendari, Sulawesi Tenggara. Museum ini didirikan pada tahun 1991 dan dikelola oleh UPTD Museum dan Taman Budaya Provinsi Sulawesi Tenggara. Dengan lebih dari 7.000 koleksi benda bersejarah, museum ini menjadi pusat informasi budaya yang penting di wilayah tersebut.',
                'rating' => 5.0,
            ],
        ];

        foreach ($data as $wisata) {
            $jenis = JenisWisata::where('nama', $wisata['jenis'])->first();
            $kecamatan = Kecamatan::where('nama', $wisata['kecamatan'])->first();

            Pariwisata::create([
                'nama' => $wisata['nama'],
                'jenis_id' => $jenis->id ?? null,
                'kecamatan_id' => $kecamatan->id ?? null,
                'alamat' => $wisata['alamat'],
                'latitude' => $wisata['latitude'],
                'longitude' => $wisata['longitude'],
                'deskripsi' => $wisata['deskripsi'],
                'rating' => $wisata['rating'],
                'gambar' => null,
            ]);
        }
    }
}
