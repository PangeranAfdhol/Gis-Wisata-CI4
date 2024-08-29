<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //login
	public $login = [
		'username'	=> 'required',
		'pwd'	=> 'required'
	];

	public $login_errors = [
		'username'		=> [
			'required'	=> 'Username wajib diisi'
		],
		'pwd'			=> [
			'required'	=> 'Password wajib diisi'
		]
	];

	//CRUD user
	public $tambah_user = [
		'role'			=> 'required',
		'username'		=> 'required',
		'pwd'           => 'required|min_length[8]',
        'konfirmasi_pwd'=> 'required|matches[pwd]',
		'nik'		    => 'required',
		'nama_depan'	=> 'required',
    ];
     
    public $tambah_user_errors = [
		'role'		=> [
			'required'	=> 'Role wajib diisi'
		],
		'username'		=> [
			'required'	=> 'Username wajib diisi'
		],
		'pwd'	        => [
			'required'	=> 'Password wajib diisi',
            'min_length'=> 'Password minimal terdiri dari 8 karakter'
		],
		'konfirmasi_pwd'=> [
            'required'	=> 'Konfirmasi Password wajib diisi',
			'matches'	=> 'Konfirmasi Password salah'
        ],
		'nik'		    => [
			'required'	=> 'NIK wajib diisi'
		],
        'nama_depan' 	=> [
            'required'	=> 'Nama Depan wajib diisi'
		]
	];
	
    public $user_pwd = [
		'pwd'			=> 'min_length[8]',
		'konfirmasi_pwd'=> 'matches[pwd]'
	];

	public $user_pwd_errors = [
		'pwd'			=> [
			'min_length'=> 'Password minimal terdiri dari 8 karakter'
		],
		'konfirmasi_pwd'=> [
			'matches'	=> 'Konfirmasi Password salah'
		]
	];

    public $edit_user = [
		'username'		=> 'required',
		'nama_depan'	=> 'required',
		'nik'		    => 'required'
    ];
     
    public $edit_user_errors = [
		'username'		=> [
			'required'	=> 'Username wajib diisi'
		],
        'nama_depan' 	=> [
            'required'	=> 'Nama Depan wajib diisi'
        ],
		'nik'		    => [
            'required'	=> 'NIK wajib diisi'
        ]
	];

	public $hapus_user = [
		'konfirmasi_hapus'	=> 'required|matches[hapus_user]'
	];

	public $hapus_user_errors = [
		'konfirmasi_hapus'		=> [
			'required'			=> 'Konfirmasi Hapus wajib diisi',
            'matches'			=> 'Konfirmasi Hapus salah'
		]
	];
	//end CRUD user

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
