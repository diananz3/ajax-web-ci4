<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Data_model;
use App\Models\Dropdown_model;

class Data extends Controller
{

    public function __construct()
    {
        require_once APPPATH . 'ThirdParty/ssp.php';
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        $uname['user_name'] = $session->get('user_name');
        $uname['role'] = $session->get('role');

        $model = new Dropdown_model();
        $data['area'] = $model->getarea();
        $data['daya'] = $model->getdaya();
        $data['olt'] = $model->getolt();
        $data['tipe_project'] = $model->get_tipe_project();
        $data['tipe_cluster'] = $model->get_tipe_cluster();
        $data['survey_harga'] = $model->get_survey_harga();
        $data['survey_net'] = $model->get_survey_net();
        $data['survey_budget'] = $model->get_survey_budget();
        $data['survey_minat'] = $model->get_survey_minat();
        $data['status_drawing'] = $model->get_status_drawing();
        $data['status_pembangunan'] = $model->get_status_pembangunan();

        // $model = new Employee_model;
        // $data['title']     = 'Data Vaksin Karyawan';
        // $data['getKaryawan'] = $model->getKaryawan();

        echo view('header', $uname);
        echo view('data_view', $data);
        echo view('footer');
    }

    public function addData()
    {
        $dataModel = new \App\Models\Data_model();
        $wilayahModel = new \App\Models\Dropdown_model();
        $db      = \Config\Database::connect();
        $builder = $db->table('data');

        $validation = \Config\Services::validation();
        // $this->validate([
        //     'nama_karyawan' => [
        //         'rules' => 'required|max_length[50]',
        //         'errors' => [
        //             'required' => 'Nama Karyawan is required',
        //             'max_length' => 'Your name is too long'
        //         ]
        //     ],
        //     'usia' => [
        //         'rules' => 'required|integer|greater_than_equal_to[10]|less_than_equal_to[100]',
        //         'errors' => [
        //             'required' => 'Usia is required',
        //         ]
        //     ],
        //     'status_vaksin_1' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Status Vaksin 1 is required'
        //         ]
        //     ],
        //     'status_vaksin_2' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Status Vaksin 2 is required'
        //         ]
        //     ]
        // ]);

        
            // $prov = array(
            //     'prov' => $this->request->getPost('prov'),
            // );
            // $nameprov = $wilayahModel->getnamaprov($prov);
        $session = session();
        //$user_id['user_id'] = $session->get('user_id');
        $user_id = $_SESSION['user_id'];
        //$user_id = $_SESSION['user_id'];
        //$autoload['libraries'] = array('session');

        //Insert data into db

        $array = [
            'user_id'   => $user_id,
        ];
            //Insert data into db
        $data = [
            'tipe_project'          => $this->request->getPost('tp_project'),
            'nama_cluster'          => $this->request->getPost('nama'),
            'tipe_cluster'          => $this->request->getPost('tipe_cluster'),
            'kelurahan'             => $this->request->getPost('desa'),
            'olt'                   => $this->request->getPost('olt'),
            'longi_lati'            => $this->request->getPost('ll'),
            'perizinan'             => $this->request->getPost('izin'),
            'kompetitor'            => $this->request->getPost('kompetitor'),
            'lokal_operator'        => $this->request->getPost('operator'),
            'tiang_listrik'         => $this->request->getPost('tiang'),
            'jumlah_rumah'          => $this->request->getPost('jml_rumah'),
            'rumah_kosong'          => $this->request->getPost('rmh_kosong'),
            'fasil_umum'            => $this->request->getPost('fasil'),
            'rata_daya'             => $this->request->getPost('daya'),
            'anak_kecil'            => $this->request->getPost('anak'),
            'kendaraan'             => $this->request->getPost('kendaraan'),
            'ac'                    => $this->request->getPost('ac'),
            'internet_bisnis'       => $this->request->getPost('bisnis'),
            'jumlah_peminat'        => $this->request->getPost('peminat'),
            'harga_iconnet'         => $this->request->getPost('harga'),
            'penggunaan_internet'   => $this->request->getPost('internet'),
            'jml_perangkat'         => $this->request->getPost('perangkat'),
            'alokasi_budget'        => $this->request->getPost('budget'),
            'sampling_minat'        => $this->request->getPost('minat'),
            'harga_iconnet_2'       => $this->request->getPost('harga2'),
            'penggunaan_internet_2' => $this->request->getPost('internet2'),
            'jml_perangkat_2'       => $this->request->getPost('perangkat2'),
            'alokasi_budget_2'      => $this->request->getPost('budget2'),
            'sampling_minat_2'      => $this->request->getPost('minat2'),
            'harga_iconnet_3'       => $this->request->getPost('harga3'),
            'penggunaan_internet_3' => $this->request->getPost('internet3'),
            'jml_perangkat_3'       => $this->request->getPost('perangkat3'),
            'alokasi_budget_3'      => $this->request->getPost('budget3'),
            'sampling_minat_3'      => $this->request->getPost('minat3'),
            'jumlah_fat'            => $this->request->getPost('fat'),
            'daftar_fat'            => $this->request->getPost('daftar_fat'),
            'ket'                   => $this->request->getPost('ket'),
            'nilai_roi'             => $this->request->getPost('roi'),
            'score'                 => $this->request->getPost('score'),
            'kelayakan'             => $this->request->getPost('layak'),
            'status_drawing'        => $this->request->getPost('drawing'),
            'maps'                  => $this->request->getPost('maps'),
            'jml_fat_ploating'      => $this->request->getPost('ploating'),
            'home_pass'             => $this->request->getPost('home_pass'),
            'approval'              => $this->request->getPost('approval'),
            'no_pa'                 => $this->request->getPost('no_pa'),
            'status_pembangunan'    => $this->request->getPost('stts_pembangunan'),
            'plan_pembangunan'      => $this->request->getPost('planbangun'),
            
        ];
        
        $builder->set($array);
        $builder->set($data);
        //$query = $employeeModel->insert($data);
        $query = $builder->insert();
        if ($query) {
            echo json_encode(['code' => 1, 'msg' => $user_id]);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data karyawan gagal ditambahkan']);
        }
        
    }

    public function getKota() {
 
        $model = new Dropdown_model();
 
        $postData = array(
            'area' => $this->request->getPost('area'),
        );
 
        $data = $model->getkota($postData);
        
        // var_dump($data);
        echo json_encode($data);
    }    

    public function getKecamatan() {
 
        $model = new Dropdown_model();
 
        $postData = array(
            'kota' => $this->request->getPost('kota'),
        );
 
        $data = $model->getkecamatan($postData);
        
        // var_dump($data);
        echo json_encode($data);
    }    

    public function getDesa() {
 
        $model = new Dropdown_model();
 
        $postData = array(
            'kec' => $this->request->getPost('kec'),
        );
 
        $data = $model->getdesa($postData);
        
        // var_dump($data);
        echo json_encode($data);
    }    

    public function getAllData()
    {
        //DB Details
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        // $table = "employees"; //langsung dr tabel employees
        $table = <<<EOT
        (
            SELECT data.id, data.user_id, data.tipe_project, data.nama_cluster, data.tipe_cluster, data.kelurahan,
            data.olt, data.longi_lati, data.kompetitor, data.jumlah_rumah, data.rata_daya, data.jumlah_peminat, data.harga_iconnet, data.penggunaan_internet, data.jml_perangkat,
            data.alokasi_budget, data.sampling_minat, data.harga_iconnet_2, data.penggunaan_internet_2, data.jml_perangkat_2, data.alokasi_budget_2, data.sampling_minat_2,
            data.harga_iconnet_3, data.penggunaan_internet_3, data.jml_perangkat_3, data.alokasi_budget_3, data.sampling_minat_3, data.jumlah_fat, data.daftar_fat, data.ket,
            data.nilai_roi, data.score, data.status_drawing, data.maps, data.jml_fat_ploating, data.home_pass, data.no_pa,data.status_pembangunan,
            data.plan_pembangunan, data.created_at, data.deleted_at, villages.desa, districts.kec, regencies.kota, area.area_nama, tipe_project.tp_jenis, tipe_cluster.tc_jenis, 
            olt.olt_nama, rata_daya.rd_jenis, sh.sh_jenis, sn.sn_jenis, sb.sb_jenis, sm.sm_jenis, status_drawing.sd_jenis, status_pembangunan.sp_jenis,
            sh2.sh_jenis AS sh_jenis2,
            sn2.sn_jenis AS sn_jenis2,
            sb2.sb_jenis AS sb_jenis2,
            sm2.sm_jenis AS sm_jenis2,
            sh3.sh_jenis AS sh_jenis3,
            sn3.sn_jenis AS sn_jenis3,
            sb3.sb_jenis AS sb_jenis3,
            sm3.sm_jenis AS sm_jenis3,
            data.perizinan, IF(data.perizinan = 1, 'Mudah', 'Sulit') AS izin,
            data.lokal_operator, IF(data.lokal_operator = 1, 'Ada', 'Tidak Ada') AS lo,
            data.tiang_listrik, IF(data.tiang_listrik = 1, 'Ada', 'Tidak Ada') AS tl,
            data.rumah_kosong, IF(data.rumah_kosong = 1, 'Sedikit <10', 'Banyak >10') AS rk,
            data.fasil_umum, IF(data.fasil_umum = 1, 'Ada', 'Tidak Ada') AS fu,
            data.anak_kecil, IF(data.anak_kecil = 1, 'Ada', 'Tidak Ada') AS ak,
            data.kendaraan, IF(data.kendaraan = 1, 'Mobil', 'Motor') AS kndrn,
            data.ac, IF(data.ac = 1, 'Ada', 'Tidak Ada') AS airc,
            data.internet_bisnis, IF(data.internet_bisnis = 1, 'Ada', 'Tidak Ada') AS ib,
            data.kelayakan, IF(data.kelayakan = 1, 'Layak', 'Tidak Layak') AS layak,
            data.approval, IF(data.approval = 1, 'Setuju', IF(data.approval = 0, 'Tidak Setuju', '')) AS approv
            FROM data
            LEFT JOIN villages ON villages.id_desa = data.kelurahan
            LEFT JOIN districts ON districts.id_kec = villages.district_id
            LEFT JOIN regencies ON regencies.id_kota = districts.regency_id
            LEFT JOIN area ON area.id_area = regencies.area_id
            LEFT JOIN tipe_project ON tipe_project.tp_id = data.tipe_project
            LEFT JOIN tipe_cluster ON tipe_cluster.tc_id = data.tipe_cluster
            LEFT JOIN olt ON olt.olt_id = data.olt
            LEFT JOIN rata_daya ON rata_daya.rd_id = data.rata_daya
            LEFT JOIN survey_harga sh ON sh.sh_id = data.harga_iconnet
            LEFT JOIN survey_net sn ON sn.sn_id = data.penggunaan_internet
            LEFT JOIN survey_budget sb ON sb.sb_id = data.alokasi_budget
            LEFT JOIN survey_minat sm ON sm.sm_id = data.sampling_minat
            LEFT JOIN survey_harga sh2 ON sh2.sh_id = data.harga_iconnet_2
            LEFT JOIN survey_net sn2 ON sn2.sn_id = data.penggunaan_internet_2
            LEFT JOIN survey_budget sb2 ON sb2.sb_id = data.alokasi_budget_2
            LEFT JOIN survey_minat sm2 ON sm2.sm_id = data.sampling_minat_2
            LEFT JOIN survey_harga sh3 ON sh3.sh_id = data.harga_iconnet_3
            LEFT JOIN survey_net sn3 ON sn3.sn_id = data.penggunaan_internet_3
            LEFT JOIN survey_budget sb3 ON sb3.sb_id = data.alokasi_budget_3
            LEFT JOIN survey_minat sm3 ON sm3.sm_id = data.sampling_minat_3
            LEFT JOIN status_drawing ON status_drawing.sd_id = data.status_drawing
            LEFT JOIN status_pembangunan ON status_pembangunan.sp_id = data.status_pembangunan
        ) temp
        EOT;//dari tabel view tp data tidak otomatis update
        $primaryKey = "id";

        $columns = array(
            array(
                "db" => "id",
                "dt" => 0,
                "formatter" => function ($d, $row) {
                    return "<div class='btn-group'>
                                  <a class='btn btn-success btn-edit kota' data-id='" . $row['id'] . "' data-bs-toggle='modal' data-bs-target='#editModal' id='updateBtn' style='margin-right: 10px'><i class='ti ti-edit'></i></a>
                                  <button class='btn btn btn-danger' data-id='" . $row['id'] . "' id='deleteDataBtn'> <i class='ti ti-trash'></i></button>
                             </div>";
                }
            ),
            array("db" => "id",                     "dt" => 1),
            array("db" => "tp_jenis",               "dt" => 2),
            array("db" => "nama_cluster",           "dt" => 3),
            array("db" => "tc_jenis",               "dt" => 4),
            array("db" => "area_nama",              "dt" => 5),
            array("db" => "kota",                   "dt" => 6),
            array("db" => "kec",                    "dt" => 7),
            array("db" => "desa",                   "dt" => 8),
            array("db" => "olt_nama",               "dt" => 9),
            array("db" => "longi_lati",             "dt" => 10),
            array("db" => "izin",                   "dt" => 11),
            array("db" => "kompetitor",             "dt" => 12),
            array("db" => "lo",                     "dt" => 13),
            array("db" => "tl",                     "dt" => 14),
            array("db" => "jumlah_rumah",           "dt" => 15),
            array("db" => "rk",                     "dt" => 16),
            array("db" => "fu",                     "dt" => 17),
            array("db" => "rd_jenis",               "dt" => 18),
            array("db" => "ak",                     "dt" => 19),
            array("db" => "kndrn",                  "dt" => 20),
            array("db" => "airc",                   "dt" => 21),
            array("db" => "ib",                     "dt" => 22),
            array("db" => "jumlah_peminat",         "dt" => 23),
            array("db" => "sh_jenis",               "dt" => 24),
            array("db" => "sn_jenis",               "dt" => 25),
            array("db" => "jml_perangkat",          "dt" => 26),
            array("db" => "sb_jenis",               "dt" => 27),
            array("db" => "sm_jenis",               "dt" => 28),
            array("db" => "sh_jenis2",              "dt" => 29),
            array("db" => "sn_jenis2",              "dt" => 30),
            array("db" => "jml_perangkat_2",        "dt" => 31),
            array("db" => "sb_jenis2",              "dt" => 32),
            array("db" => "sm_jenis2",              "dt" => 33),
            array("db" => "sh_jenis3",              "dt" => 34),
            array("db" => "sn_jenis3",              "dt" => 35),
            array("db" => "jml_perangkat_3",        "dt" => 36),
            array("db" => "sb_jenis3",              "dt" => 37),
            array("db" => "sm_jenis3",              "dt" => 38),
            array("db" => "jumlah_fat",             "dt" => 39),
            array("db" => "daftar_fat",             "dt" => 40),
            array("db" => "ket",                    "dt" => 41),
            array("db" => "nilai_roi",              "dt" => 42),
            array("db" => "score",                  "dt" => 43),
            array("db" => "layak",                  "dt" => 44),
            array("db" => "sd_jenis",               "dt" => 45),
            array("db" => "maps",                   "dt" => 46),
            array("db" => "jml_fat_ploating",       "dt" => 47),
            array("db" => "home_pass",              "dt" => 48),
            array("db" => "approv",                 "dt" => 49),
            array("db" => "no_pa",                  "dt" => 50),
            array("db" => "sp_jenis",               "dt" => 51),
            array("db" => "plan_pembangunan",       "dt" => 52),
            array("db" => "created_at",             "dt" => 53),
        );
        $session = session();
        $user_id = $_SESSION["user_id"];
        $role = $_SESSION["role"];

        if($role === "Admin") {
            echo json_encode(
                \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, null, "deleted_at IS NULL")
            );
        } else {
            echo json_encode(
                \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, null, "user_id = '$user_id' AND deleted_at IS NULL")
            );
        }
    }

    //menampilkan data ke modal edit berdasarkan id 
    // public function getEmployeeInfo()
    // {
    //     $employeeModel = new \App\Models\Employee_model();
    //     $employeeId = $this->request->getPost('id');
    //     $info = $employeeModel->find($employeeId);
    //     if ($info) {
    //         echo json_encode(['code' => 1, 'msg' => '', 'results' => $info]);
    //     } else {
    //         echo json_encode(['code' => 0, 'msg' => 'No results found', 'results' => null]);
    //     }
    // }

    public function deleteData()
    {
        $dataModel = new \App\Models\Data_model();
        $data_id = $this->request->getPost('id');
        $query = $dataModel->delete($data_id);

        if ($query) {
            echo json_encode(['code' => 1, 'msg' => 'Data behasil dihapus']);
        } else {
            echo json_encode(['code' => 0, 'msg' => 'Data gagal dihapus']);
        }
    }

    public function edit()
    {
        $model = new Data_model();
        $id = $this->request->getPost("edit_id");

        $data['data'] = $model->getData($id);
        // echo json_encode($data);
        // $data['employee'] = $model->getEmployee($id)->getResult();
        return $this->response->setJSON($data);
        // var_dump($data);
    }

    public function update()
    {
        $validation = \Config\Services::validation();
        $model = new Data_model;

        // $this->validate([
        //     'nama_karyawan' => [
        //         'rules' => 'required|max_length[50]',
        //         'errors' => [
        //             'required' => 'Nama Karyawan is required'
        //         ]
        //     ],
        //     'usia' => [
        //         'rules' => 'required|integer|greater_than_equal_to[10]|less_than_equal_to[100]',
        //         'errors' => [
        //             'required' => 'Usia is required'
        //         ]
        //     ],
        //     'status_vaksin_1' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Status Vaksin 1 is required'
        //         ]
        //     ],
        //     'status_vaksin_2' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Status Vaksin 2 is required'
        //         ]
        //     ]
        // ]);

        // if ($validation->run() == FALSE) {
        //     $errors = $validation->getErrors();
        //     echo json_encode(['code' => 0, 'error' => $errors]);
        // } else {
            $id = $this->request->getPost("edit_id");
            $data = [
                'tipe_project' => $this->request->getPost('tipe_project'),
                'nama_cluster' => $this->request->getPost('nama_cluster'),
                'tipe_cluster' => $this->request->getPost('tipe_cluster'),
                'kelurahan' => $this->request->getPost('desa'),
                'olt' => $this->request->getPost('olt'),
                'longi_lati' => $this->request->getPost('longi_lati'),
                'perizinan' => $this->request->getPost('izin'),
                'kompetitor' => $this->request->getPost('kompetitor'),
                'lokal_operator' => $this->request->getPost('lokal_operator'),
                'tiang_listrik' => $this->request->getPost('tiang_listrik'),
                'jumlah_rumah' => $this->request->getPost('jumlah_rumah'),
                'rumah_kosong' => $this->request->getPost('rumah_kosong'),
                'fasil_umum' => $this->request->getPost('fasil_umum'),
                'rata_daya' => $this->request->getPost('rata_daya'),
                'anak_kecil' => $this->request->getPost('anak_kecil'),
                'kendaraan' => $this->request->getPost('kendaraan'),
                'ac' => $this->request->getPost('ac'),
                'internet_bisnis' => $this->request->getPost('internet_bisnis'),
                'jumlah_peminat' => $this->request->getPost('jumlah_peminat'),
                'harga_iconnet' => $this->request->getPost('harga_iconnet'),
                'penggunaan_internet' => $this->request->getPost('penggunaan_internet'),
                'jml_perangkat' => $this->request->getPost('jml_perangkat'),
                'alokasi_budget' => $this->request->getPost('alokasi_budget'),
                'sampling_minat' => $this->request->getPost('sampling_minat'),
                'harga_iconnet_2' => $this->request->getPost('harga_iconnet_2'),
                'penggunaan_internet_2' => $this->request->getPost('penggunaan_internet_2'),
                'jml_perangkat_2' => $this->request->getPost('jml_perangkat_2'),
                'alokasi_budget_2' => $this->request->getPost('alokasi_budget_2'),
                'sampling_minat_2' => $this->request->getPost('sampling_minat_2'),
                'harga_iconnet_3' => $this->request->getPost('harga_iconnet_3'),
                'penggunaan_internet_3' => $this->request->getPost('penggunaan_internet_3'),
                'jml_perangkat_3' => $this->request->getPost('jml_perangkat_3'),
                'alokasi_budget_3' => $this->request->getPost('alokasi_budget_3'),
                'sampling_minat_3' => $this->request->getPost('sampling_minat_3'),             
                'jumlah_fat' => $this->request->getPost('jumlah_fat'),
                'daftar_fat' => $this->request->getPost('daftar_fat'),
                'ket' => $this->request->getPost('ket'),
                'nilai_roi' => $this->request->getPost('nilai_roi'),
                'score' => $this->request->getPost('score'),
                'kelayakan' => $this->request->getPost('kelayakan'),
                'status_drawing' => $this->request->getPost('status_drawing'),
                'maps' => $this->request->getPost('maps'),
                'jml_fat_ploating' => $this->request->getPost('jml_fat_ploating'),
                'home_pass' => $this->request->getPost('home_pass'),
                'approval' => $this->request->getPost('approval'),
                'no_pa' => $this->request->getPost('no_pa'),
                'status_pembangunan' => $this->request->getPost('status_pembangunan'),
                'plan_pembangunan' => $this->request->getPost('plan_pembangunan')

            ];
            $update = $model->update($id, $data);

            if ($update) {
                $output = ['status' => 'Data berhasil diupdate'];
                return $this->response->setJSON($output);
            } else {
                $output = ['status' => 'Data gagal diupdate'];
                return $this->response->setJSON($output);
            }
        // }
    }


    //----------------------- Import csv -----------------------//
    public function importCsvToDb()
    {
        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,8024]|ext_in[file,csv],'
        ]);
        if (!$input) {
            $data['validation'] = $this->validator;
            return view('index', $data); 
        }else{
            if($file = $this->request->getFile('file')) {
            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('../public/csvfile', $newName);
                $file = fopen("../public/csvfile/".$newName,"r");
                $i = 0;
                $numberOfFields = 6;
                $csvArr = array();
                
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);
                    if($i > 0 && $num == $numberOfFields){ 
                        
                        // $csvArr[$i]['No.'] = $filedata[0];
                        // $csvArr[$i]['Nama Kayawan'] = $filedata[1];
                        // $csvArr[$i]['Usia'] = $filedata[2];
                        // $csvArr[$i]['Status Vaksin 1'] = $filedata[3];
                        // $csvArr[$i]['Status Vaksin 2'] = $filedata[4];
                        // $csvArr[$i]['Aksi'] = $filedata[5];

                        // $csvArr[$i]['id' || 'No'] = $filedata[0];
                        // $csvArr[$i]['nama_karyawan' || 'Nama Karyawan'] = $filedata[1];
                        // $csvArr[$i]['usia' || 'Usia'] = $filedata[2];
                        // $csvArr[$i]['status_vaksin_1' || 'Status Vaksin 1'] = $filedata[3];
                        // $csvArr[$i]['status_vaksin_2' || 'Status Vaksin 2'] = $filedata[4];
                        // $csvArr[$i]['aksi' || 'Aksi'] = $filedata[5];

                        $csvArr[$i]['id'] = $filedata[0];
                        $csvArr[$i]['nama_karyawan'] = $filedata[1];
                        $csvArr[$i]['usia'] = $filedata[2];
                        $csvArr[$i]['status_vaksin_1'] = $filedata[3];
                        $csvArr[$i]['status_vaksin_2'] = $filedata[4];
                        $csvArr[$i]['aksi'] = $filedata[5];
                    }
                    $i++;
                }
                fclose($file);
                $count = 0;
                foreach($csvArr as $userdata){
                    $employee = new Employee_model();
                    $findRecord = $employee->where('id', $userdata['id'])->countAllResults();
                    if($findRecord == 0){
                        if($employee->insert($userdata)){
                            $count++;
                        }
                    }
                }
                session()->setFlashdata('message', $count.' rows successfully added.');
                session()->setFlashdata('alert-class', 'alert-success');
            }
            else{
                session()->setFlashdata('message', 'CSV file coud not be imported.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
            }else{
            session()->setFlashdata('message', 'CSV file coud not be imported.');
            session()->setFlashdata('alert-class', 'alert-danger');
            }
        }
        return redirect()->route('/');         
    }

    public function uploadEmployee()
    {
        if ($this->request->getMethod() == "post") {

            $file = $this->request->getFile("file");
            $file_name = $file->getTempName();
            $employee = array();
            $csv_data = array_map('str_getcsv', file($file_name));

            if (count($csv_data) > 0) {

                $index = 0;

                foreach ($csv_data as $data) {
                    if ($index > 0) {
                        $employee[] = array(
                            "nama_karyawan" => $data[1],
                            "usia" => $data[2],
                            "status_vaksin_1" => $data[3],
                            "status_vaksin_2" => $data[4],
                        );
                    }
                    $index++;
                }

                $builder = $this->db->table('employees');
                $builder->insertBatch($employee);
                $session = session();
                $session->setFlashdata("success", "Data saved successfully");
                return redirect()->to(base_url('/'));
            }
        }
    return redirect()->route('/');    }
}
