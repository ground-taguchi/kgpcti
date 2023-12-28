# KYOTOCTI説明  
  
## ローカル環境構築
 - リポジトリのクローン  
 ※windowsの場合はUbuntu上にクローンする。MacはそのままでOK  
 WSL2の有効化・Ubuntuインストール参照  
 https://zenn.dev/na9/articles/ffe7b884fee7d2#5.-sail%E3%82%A8%E3%82%A4%E3%83%AA%E3%82%A2%E3%82%B9%E3%81%AE%E8%A8%AD%E5%AE%9A

        git clone https://github.com/ground-taguchi/kgpcti.git

 - Composerパッケージのインストール

        docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v $(pwd):/var/www/html \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs


 - envファイルの作成パッケージのインストール

        cp .env.example .env

 - コンテナ内のMySQLに接続するためにenvファイル修正

        DB_HOST=127.0.0.1
        ↓
        DB_HOST=mysql

 - PhpMyAdmiのコンテナ追記

            docker-composer.ymlに追記する(インデント注意)

            【通常】
            phpmyadmin:
                image: phpmyadmin/phpmyadmin
                links:
                    - mysql:mysql
                ports:
                    - 8080:80
                environment:
                    PMA_HOST: mysql
                networks:
                    - sail

                【ipass省略(本番環境では多分やめた方がいい)】
                phpmyadmin:
                    image: phpmyadmin/phpmyadmin
                    links:
                        - mysql:mysql
                    ports:
                        - 8080:80
                    environment:
                        PMA_USER: "${DB_USERNAME}"
                        PMA_PASSWORD: "${DB_PASSWORD}"
                        PMA_HOST: mysql
                    networks:
                        - sail

 - sailコマンドのエイリアス作成

        「.zshrc開く(bashなら.bashrc)」
        vi ~/.zshrc

        「ファイルに以下の一行追記」
        alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

        「上記を保存して、以下のコマンドで変更反映させる」
        source ~/.bashrc

 - APP_KEYの更新

        sail php artisan key:generate

 - NPMインストール(Laravel-mixのため)

        sail npm install
        sail npm run dev

 - コンテナ起動

        sail up -d

 - コンテナ停止

        sail down

## デバッグ

デバッグ:
sailに最初から入ってるXdebugでデバッグできる  
以下、vscodeでの実行の場合  

 - ~/.vscode/launch.jsonの作成:  

    「vscodeの実行とデバッグ」→「launch.jsonを作成します」→「PHP」を選択  
    「configuratiohns」ブロックのL「isten for Xdebug」部分を以下の通りに変更:

        {
        "name": "Listen for Xdebug",
        "type": "php",
        "request": "launch",
        "port": 9003,
        "stopOnEntry": true,
        "pathMappings": {
            "/var/www/html": "${workspaceFolder}"
        }
        },

 - envに下記一行追加:

        AIL_XDEBUG_MODE=develop,debug
    追加後sailの再起動する  

- デバッグ実行:  
    - F5でデバッガーの起動  


- CLI(artisanコマンド)のデバッグ:
    - 例：マイグレーションの場合
        - デバッガーが起動してるか確認(F5)
        - 適当なマイグレーションファイルを作成
        - 適当なポイントにブレークポイント設置
        - sail debug migrate 実行
            # sail artisan migrateではなくdebugで実行するのがポイント

 - ブラウザアクセスのデバッグ:
    - デバッガーが起動してるか確認(F5)
    - 適当な箇所にブレークポイント設置
    - urlパラメーターに「?XDEBUG_SESSION_START=session_name」を追加してアクセス
     - 例：http://localhost/?XDEBUG_SESSION_START=session_name
