<?php
    function them_vao_chuoi($chuoi)
    {
    $chuoi .= "và chuỗi sau khi thêm.";
    return $chuoi;
    }
    $chuoi_goc= "Đây là chuỗi gốc, ";
    echo them_vao_chuoi($chuoi_goc);
    //→ "Đây là chuỗi gốc, và chuỗi sau khi thêm."
    echo $chuoi_goc ; //→ "Đây là chuỗi gốc, "
?>