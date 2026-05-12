# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
 - <input type="hidden" name="_method" value="PUT">というように、inputタグが出力されている。

### findメソッドの引数に指定しているIDは何のIDか
 - DBのtodosテーブルに格納されているインスタンスのID

### findメソッドで実行しているSQLは何か
 - SELECT * FROM `todos` WHERE`id`= $id;

### findメソッドで取得できる値は何か
 - 上記のようにtodosテーブルの中から特定のIDを探し出すことを行っている。

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
 - $todo -> all();の時やnew TodoなどIDを持たないものに関してはINSERTを実行、findメソッドのようにIDを所有しているものを呼び出しているときにはUPDATEを行う。

## Todo論理削除

### traitとclassの違いとは
 - トレイトはインスタンス化ができない。クラスの継承時には１対１の継承が行われていたが、トレイトは１対多の追加が可能（継承とは別物）

### traitを使用するメリットとは
 - 上記にも記載の通り、トレイトはuseを行うことで複数のクラス間でのコード共通化や再利用などの追加が可能になる。

## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
 - インスタンス化のタイミングで行われる。

### RequestクラスからFormRequestクラスに変更した理由
 - todosテーブルのcontentカラムにNULLを登録すると（フォームで未記載など）エラーを吐くため、FormRequestクラスを使うことでバリデーションの設定を行う。

### $errorsのhasメソッドの引数・返り値は何か
 - 本件の場合は入力したcontent（引数）でバリデーションエラーが発生しているか否か（返り値）。

### $errorsのfirstメソッドの引数・返り値は何か
 - 上記hasで得たバリデーションエラーの内容（引数）をTodoRequestで定義しているmessagesを返す（返り値）。

### フレームワークとは何か
 - ファイルのディレクトリ構成が事前に決まっているという性質上、指定のファイルやディレクトリに処理を書き換えることで一定品質のプロダクトが作成できる枠組み。

### MVCはどういったアーキテクチャか
 - Model、View、Controllerの頭文字。このアーキテクチャを利用することで可読性や再利用性が増す。結果として開発効率が上がる。

### ORMとは何か、またLaravelが使用しているORMは何か
 - Laravelが利用しているORMはeloquent。ORMとはPHP他プログラミング言語のclassとDBのテーブルを紐づけることでSQL文を記載せずDBとのやり取りが可能になる。Laravelの場合classはModel。

### composer.json, composer.lockとは何か
 - composer.jsonでインストールしたいパッケージをcomposerに指示する（この情報をもとにパッケージを入手の場合はinstall）。
 　composer.lockはinstall時にない場合は新規に作成され、バージョン情報を残す。もしinstall時にcomposer.lockが存在する場合はcomposer.lockに書き出されているバージョンのダウンロードを行う。チームで同じバージョンをダウンロードするときなどに使用可能。（Qiitaにて確認）

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
 - vendor/に格納される。これはcomposer.jsonなどと同じ階層に保存される。（こちらもQiitaにて確認）