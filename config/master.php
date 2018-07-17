<?php

return [
    'MESSAGE_NOTIFICATION' => [
        'MSG_001' => 'email or password is wrong.',
        'MSG_002' => 'パスワードは、英字大文字、英字小文字、数字、記号を組み合わせてください。',
        'MSG_003' => 'パスワードは、8文字以上20文字以下で設定してください。',
        'MSG_004' => 'セッションが切れました。もう一度ログインをお願いします。',
        'MSG_005' => 'この項目は必須入力です。',
        'MSG_006' => 'メールアドレスが正しくありません。',
        'MSG_007' => '{0}は{1}で入力してください。',
        'MSG_008' => '{0}は{1}桁で入力してください。',
        'MSG_009' => '{0}は{1}桁以下で入力してください。',
        'MSG_010' => '電話番号が正しくありません。',
        'MSG_011' => '所属する店舗名を入力してください。',
        'MSG_012' => 'メールアドレスが一致しません。',
        'MSG_013' => 'アップロード可能なファイルを指定してください。',
        'MSG_014' => 'アップロード対象のファイルが選択されていません。',
        'MSG_015' => '対象のデータがありません。',
        'MSG_016' => '登録が完了しました。',
        'MSG_017' => '変更が完了しました。',
        'MSG_018' => '削除が完了しました。',
        'MSG_019' => '登録に失敗しました。',
        'MSG_020' => '変更に失敗しました。',
        'MSG_021' => '削除に失敗しました。',
        'MSG_022' => '変更します。宜しいでしょうか。',
        'MSG_023' => '',
        'MSG_024' => '対象の{0}は使用されているので、削除できません。',
        'MSG_025' => '{0}が重複するデータが存在します。',
        'MSG_026' => '{0}の入力が正しくありません。',
        'MSG_027' => 'パスワードとパスワード再入力の値が一致していません。',
        'MSG_028' => 'URLが正しくありません。',
        'MSG_029' => '設定変更の有効期限が切れています。',
        'MSG_030' => '以前と同じパスワードは設定できません。',
        'MSG_031' => 'A system error has occurred.',
        'MSG_032' => '入力された{0}は存在しません。',
        'MSG_033' => '',
        'MSG_034' => '',
        'MSG_035' => '既にそのデータは登録されています。',
        'MSG_036' => '',
        'MSG_037' => 'メールアドレスは登録されています。',
        'MSG_038' => '日付が不正です。',
        'MSG_039' => '',
        'MSG_040' => '仮登録が完了しました。ご指定のメールアドレスへ本登録のご連絡を行いました。<br/> 24時間以内に本登録の実施をお願いします。',
        'MSG_041' => 'ご指定のメールアドレスへパスワード再設定のご連絡をしました。24時間以内にパスワードの設定をお願いします。',
        'MSG_042' => '本登録の有効期限が切れています。',
        'MSG_043' => 'ご指定のメールアドレスへメールアドレス変更のご連絡をしました。24時間以内にご確認の実施をお願いします。',
        'MSG_044' => 'メールアドレス変更確認の有効期限が切れています。',
        'MSG_050' => '{0}の入力が不正です。',
        'MSG_051' => '処理対象を選択してください。', //Password not match
        'MSG_080' =>'特権の管理者を全て削除することはできません。',
        'MSG_900' =>'イメージファイルのフォーマット（png,jpg,gif）を確認して下さい。',
        'MSG_901' =>'ファイルサイズ（5MB）オーバーです。',
        'MSG_902' =>'{0}ファイルを指定してください。',
    ],
    'MESSAGE_TEXT' => [
        'select' => '--',
        'select_full' => '-- 選択してください --',
    ],
    'ADMIN_ROLE' => [
        'SUPER_ADMIN' => 1,
        'ADMIN' => 2,
        'EDITOR' => 3,
    ],
    'YEAR' => date('Y'),
    'YEAR_MIN' => date('Y')-80,
    'YEAR_MAX_EXPIRED' => 2040,
    'YEAR_MAX_EDUCATION' => 2025,
    'ID_OTHER' => '99',
    'NAME_OTHER' => 'その他（下の欄に詳細を記入）',
    'NAME_OTHER_SHORT' => 'その他',
    'ID_COUNTRY_OTHER' => '3',
    'PAGINATION_ITEM_PER_PAGE' => 9,
    'PAGINATION_NO_RESULT_MESSAGE' => '対象の求職者は見つかりません。',
    'COUNTRY' => [
        '1' => '韓国',
        '2' => '日本',
        '3' => 'その他',
    ],
    'SEX' => [
        '1' => '男性',
        '2' => '女性',
    ],
    'EDUCATION_STATUS' => [
        '1' => '卒業',
        '2' => '卒業予定',
        '3' => '在学中',
        '4' => '休学中',
        '5' => '復学予定',
    ],
    'WORK_EXPERIENCE_STATUS' => [
        '1' => '退職',
        '2' => '在職中',
    ],
    'WORK_EXPERIENCE_CONTRACT' => [
        '1' => '正社員',
        '2' => '契約社員',
        '3' => 'インターン',
        '4' => 'アルバイト（WH）',
        '5' => 'アルバイト（留学）',
    ],
    'JLPT_NAME' => [
        '1' => 'N1',
        '2' => 'N2',
        '3' => 'N3',
    ],
    'AREA_NAME' => [
        '1' => [
            'name'=>'北海道',
            'group'=>[
                '1' => '北海道',
            ],
        ],
        '2' => [
            'name'=>'東北',
            'group'=>[
                '2' => '青森県',
                '3' => '岩手県',
                '4' => '秋田県',
                '5' => '宮城県',
                '6' => '山形県',
                '7' => '福島県',
            ],
        ],
        '3' => [
            'name'=>'関東',
            'group'=>[
                '8' => '茨城県',
                '9' => '栃木県',
                '10' => '群馬県',
                '11' => '埼玉県',
                '12' => '千葉県',
                '13' => '東京都',
                '14' => '神奈川県',
            ],
        ],
        '4' => [
            'name'=>'中部',
            'group'=>[
                '15' => '新潟県',
                '16' => '富山県',
                '17' => '石川県',
                '18' => '福井県',
                '19' => '山梨県',
                '20' => '長野県',
                '21' => '岐阜県',
                '22' => '静岡県',
                '23' => '愛知県',
            ],
        ],
        '5' => [
            'name'=>'近畿',
            'group'=>[
                '24'=> '三重県',
                '25' => '滋賀県',
                '26' => '奈良県',
                '27' => '和歌山県',
                '28' => '京都府',
                '29' => '大阪府',
                '30' => '兵庫県',
            ],
        ],
        '6' => [
            'name'=>'中国',
            'group'=>[
                '31' => '岡山県',
                '32' => '広島県',
                '33' => '鳥取県',
                '34' => '島根県',
                '35' => '山口県',
            ],
        ],
        '7' => [
            'name'=>'四国',
            'group'=>[
                '36' => '香川県',
                '37' => '徳島県',
                '38' => '愛媛県',
                '39' => '高知県',
            ],
        ],
        '8' => [
            'name'=>'九州',
            'group'=>[
                '40' => '福岡県',
                '41' => '佐賀県',
                '42' => '長崎県',
                '43' => '大分県',
                '44' => '熊本県',
                '45' => '宮崎県',
                '46' => '鹿児島県',
                '47' => '沖縄県',
            ],
        ],
    ],
    'CANDIDATES'=>[
        'EMAIL'=>[
            'RegisterTemp'=>[
                'Subject'=>'[99s JOB Japan] 仮登録完了',
                'BodyContent'=>'emails.candidates.register_temporary',
            ],
            'RegisterSucc'=>[
                'Subject'=>'[99s JOB Japan] 本登録完了',
                'BodyContent'=>'emails.candidates.register_succ',
            ],
            'ResetPass'=>[
                'Subject'=>'[99s JOB Japan] パスワードリセット',
                'BodyContent'=>'emails.candidates.reset_pass',
            ],
            'WithDraw' => [
                'Subject'=>'[99s JOB Japan] WithDraw',
                'BodyContent'=>'emails.candidates.withdraw',
            ],
            'ChangeEmail' => [
                'Subject'=>'[99s JOB Japan] メールアドレス変更手続き',
                'BodyContent'=>'emails.candidates.changeemail',
            ]
        ],
        'META' => [
            'sitename' => '99s JOB Japan',
            //Action Name
            'index'=> [
                'meta_title' => '99s JOB Japan',
                'meta_description' => '',
            ],
            'temp_register'=> [
                'meta_title' => '仮登録',
                'meta_description' => '',
            ],
            'register'=> [
                'meta_title' => '基本情報入力',
                'meta_description' => '',
            ],
            'login'=> [
                'meta_title' => 'ログイン',
                'meta_description' => '',
            ],
            'mypage'=> [
                'meta_title' => 'マイページ',
                'meta_description' => '',
            ],
            'profile'=> [
                'meta_title' => '基本情報入力',
                'meta_description' => '',
            ],
            'desire'=> [
                'meta_title' => '希望条件入力',
                'meta_description' => '',
            ],
            'forgot_pass'=> [
                'meta_title' => 'パスワード再設定',
                'meta_description' => '',
            ],
            'reset_pass'=> [
                'meta_title' => 'パスワード変更',
                'meta_description' => '',
            ],
            'reset_pass_successful'=> [
                'meta_title' => 'パスワード変更',
                'meta_description' => '',
            ],
            'withdraw'=> [
                'meta_title' => '退会',
                'meta_description' => '',
            ],
            'withdrawthank'=> [
                'meta_title' => '退会',
                'meta_description' => '',
            ],
            'logininfomation'=> [
                'meta_title' => 'ログイン情報',
                'meta_description' => '',
            ],
            'changeemail' => [
                'meta_title' => 'メールアドレスの変更',
                'meta_description' => '',
            ],
        ],
        'CD_DISPLAY' => [
            'prefix' => '',
            'length' => 7
        ],
        'NOAVATAR' => '/front/images/img-job-info-demo.jpg',
        'REASONS' => [
            '1' => '退会理由についての項目 1。',
            '2' => '退会理由についての項目 2。',
            '3' => '退会理由についての項目 3。'
        ]
    ],
    'ADMIN'=>[
        'EMAIL'=>[

        ],
        'META' => [
            'sitename' => '99s JOB Japan',
            //Action Name
            'index'=> [
                'meta_title' => '99s JOB Japan',
                'meta_description' => '',
            ],
            'register'=> [
                'meta_title' => '基本情報入力',
                'meta_description' => '',
            ],
            'login'=> [
                'meta_title' => 'ログイン',
                'meta_description' => '',
            ],
            'mypage'=> [
                'meta_title' => 'マイページ',
                'meta_description' => '',
            ],
            'candidates.list'=> [
                'meta_title' => '求職者検索',
                'meta_description' => '',
            ],
            'candidates.opinion'=> [
                'meta_title' => '求職者所見入力',
                'meta_description' => '',
            ],
            'candidates.browser.resume'=> [
                'meta_title' => '履歴書出力',
                'meta_description' => '',
            ],
            
            //thaivuong
            'candidates.detail.get'=> [
                'meta_title' => '求職者詳細',
                'meta_description' => '',
            ],
            'candidates.changevideo.get'=> [
                'meta_title' => '動画変更',
                'meta_description' => '',
            ],
            'candidates.company_recommendation.list.get'=> [
                'meta_title' => '企業情報一覧（推薦）',
                'meta_description' => '',
            ],
            'candidates.company_recommendation.select.get'=> [
                'meta_title' => '推薦企業選択',
                'meta_description' => '',
            ],
            
            //TBinh
            'company.search'=> ['meta_title' => '企業情報','meta_description' => ''],
            'company.details'=> ['meta_title' => '企業情報閲覧','meta_description' => ''],
            'company.details.edit'=> ['meta_title' => '企業情報変更','meta_description' => ''],
            
            'list'=> ['meta_title' => '管理者','meta_description' => ''],
            'list.admin_info_edit'=> ['meta_title' => '管理者登録変更','meta_description' => ''],
            'list.login.information'=> ['meta_title' => 'ログイン情報','meta_description' => ''],
        ],
        'NOAVATAR' => '/front/images/img-job-info-demo.jpg',
    ],
    'VALIDATETYPE'=>[
        'IMAGE' =>[
            'TYPE' => ["image/gif", "image/jpeg", "image/png","image/pjpeg"],
            'MAXSIZE' => 5242880 // 5 MB
        ],
        'DOC' =>[
            'TYPE' => ["doc", "docx", "pdf"],
            'MAXSIZE' => 5242880 // 5 MB
        ],
        'PDF' =>[
            'TYPE' => ["pdf"],
            'MAXSIZE' => 5242880 // 5 MB
        ]
    ],
    'dir_temp_registration' => 'files/temp_registration/',
    'dir_candidates' => 'files/candidates/',
    'EMAIADMINSTRATOR' =>'hong.tho@primelabo.com.vn'
];
