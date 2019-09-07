<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $names = ["Taro", "Jiro", "Hana", "John", "Mike", "Sophy", "Bill", "Alex", "Mary", "Tom"];
        $fnames = ["佐藤", "鈴木", "高橋", "田中"];
        $gnames = ["太郎", "次郎", "花子"];

        // 適当に１０人作成する
        for ( $i = 0; $i < 10; $i++ )
        {
            $param = [
                'number' => $i + 10,
                'name' => $names[$i],
                'full_name' => "{$fnames[$i % 4]}{$gnames[$i % 3]}",
                'email' => "{$names[$i]}@example.com",
                'birthday' => "1981/12/01",
                'sex' => [1, 1, 0][$i % 3],
                'administrator' => ($i == 0),
                'password' => 'password',
            ];

            DB::table('members')->insert($param);
        } */

        $body =
            'Morning Gloryが４対２でSunflowerに勝利。<br />'.
            '２回表、６番渡辺の二塁打から７番山田、８番高橋の連続タイムリーで２点先制。<br />'.
            '９回表、ランナー二塁で２番田中の二塁打で２点を挙げ、ダメを押しました。<br />'.
            '投げては初先発の山本が７回を２失点に抑え、伊藤、中村とつないで逃げ切りました。';
        for ( $i = 0; $i < 10; $i++ )
        {
            $article = [
                'title' => "練習試合の結果". ($i + 1),
                'body' => $body,
                'released_at' => date("Y/m/d H:i:s", strtotime('-8 day')),
                'expired_at' => date("Y/m/d H:i:s", strtotime('-3 day')),
                'member_only' => ( $i % 3 == 0 )? 1 : 0,
             ];

            DB::table('articles')->insert($article);
        }

    }
}
