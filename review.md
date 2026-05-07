# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
 - SELECT * FROM todos;
### Todoモデルのallメソッドの返り値は何か
 - Illuminate\Database\Eloquent\Collection
### 配列の代わりにCollectionクラスを使用するメリットは
 - あらかじめメソッドが存在しているので冗長な記載を省ける。
### view関数の第1・第2引数の指定と何をしているか
 - 第1引数で使うbladeファイルを指定。第2引数でbladeファイル内の変数を代入したい形にする。
### index.blade.phpの$todos・$todoに代入されているものは何か
 - Todo.php上でuseされている'Illuminate\Database\Eloquent\Model;'の部分。Modelから引き出したcontentを表示している。
## Todo作成機能

### Requestクラスのallメソッドは何をしているか
 - 送信された値を一括で取得、array(配列・keyとvalue)としてすべて返す。
### fillメソッドは何をしているか
 - ->all()等で得た情報をTodoインスタンスのプロパティに一括で代入する。
### $fillableは何のために設定しているか
 - 脆弱性を突かれないため。fillをable(可能)という名の通り$fillableした対象しか一括代入の対象にならない。
### saveメソッドで実行しているSQLは何か
 - INSERT INTO `todos`(カラム名) VALUES(カラムの内容);
### redirect()->route()は何をしているか
 - 指定したrouteに遷移する。実体験としてこれを設定していないと終了後画面が定まらず、再読み込みした時にもう一度ToDoが登録される。


## その他

### テーブル構成をマイグレーションファイルで管理するメリット
 - SQLを直接触ることなく、PHP知識のみで操作が可能。また、マイグレーションファイルの共有をすることで他の開発メンバーも同じテーブル作成が可能になる。
### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
 - public function
### Seederクラスの役割は何か
 - テストデータの定義と実行した際にデータをテーブルに挿入するINSERT文を記載する。また、開発者間のテーブルに齟齬を生じさせないようにtruncateメソッドを記載する。
### route関数の引数・返り値・使用するメリット
 - 引数はルート名で、返り値はURLなどの文字列。使用するメリットとしてはroute関数を設定しておくことでhref属性の可読性を上げることができる。最初にルート名とURLなどを決めておくことでURLに変更があった際の修正が容易になる。
### @extends・@section・@yieldの関係性とbladeを分割するメリット
 - @extendsでレイアウト先のbladeを指定し、@section~@endsectionの中をレイアウト先の@yield内に格納させることができる。これで、複数回共通のHTML部分を省略することが可能になる。
### @csrfは何のための記述か
 - クロスサイトリクエストフォージェリを防ぐための記述。PHPではsessionなどを利用しトークンなどを用いて防止していたが、Laravelでは@csrfのみで可能。
### {{ }}とは何の省略系か
 - bladeにてPHPの記述を行う際に使用する。エスケープ処理を含めたechoを省略している。とのこと。