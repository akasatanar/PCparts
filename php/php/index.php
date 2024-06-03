<?php
function print_calendar(){
/* 見出し(曜日)の配列を作成する */
    $youbi = ['日','月','火','水','木','金','土'];
/* 今月頭の年月日を取得する */
    $today = date('Y-m').'-01';
/* 表示するカレンダーの年月を表示 */
    print date('Y年m月');
/* テーブルタグを表示 */
    print '<table>';
/* 見出し含め、7行分ループ処理 */
    for($i=0;$i<7;$i++){
/* テーブルのtrタグを表示(行) */
        print '<tr>';
/* 一週間(7日)ループ処理 */
        for($j=0;$j<7;$j++){
/* 見出し部分(最初の行)か */
            if($i==0){/* $iが0の時は、先頭行なので、曜日を表示する。 */
/* 今表示するのは何曜日？ */
                switch($j){
                    case 0:/* 日曜日(クラス付与)  */
                        print '<th class="Sunday">';
                        break;
                    case 6:/* 土曜日(クラス付与)  */
                        print '<th class="Saturday">';
                        break;
                    default:/* その他 */
                        print '<th>';
                        break;
                }
/* 曜日を表示 */
                print $youbi[$j].'</th>';
            }else{/* $iが0以外の時は、2行目以降なので、日を表示する。 */
/* 処理する日は今月か？ */
                if($today<=date('Y-m-t') && date('w',strtotime($today))==$j){
/* 今表示するのは何曜日？ */
                    switch($j){
                        case 0:/* 日曜日(クラス付与)  */
                            print '<td class="Sunday ';
                            break;
                        case 6:/* 土曜日(クラス付与)  */
                            print '<td class="Saturday ';
                            break;
                        default:/* その他 */
                            print '<td class="';
                            break;
                    }
/* 今日は背景を黄色にする(クラス付与) */
                    if($today==date('Y-m-d')){
                        print 'Today';
                    }
/* 日を表示 */
                    print ' ">'.date('d',strtotime($today)).'</td>';
/* 次の処理用に年月日を+1日更新 */
                    $today = date('Y-m-d',strtotime($today.' +1 days'));
                }else{
/* 今月外の場合は枠だけ表示 */
                    print '<td>　</td>';
                }
            }
        
        }
/* テーブルのtrタグ終わりを表示 */
        print '</tr>';
    }
/* テーブルの終わりを表示 */
    print '</table>';
}
?>