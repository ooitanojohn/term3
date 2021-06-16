<?php
// エスケープ処理　文字短く
function escape($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

// function m_isset($array_mixed)
// {
//     while($array_mixed){
//         explode(',',
//     }
// }