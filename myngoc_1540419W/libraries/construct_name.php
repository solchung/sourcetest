<?php if(!@defined('_lib')) die("Error");
/////////////////////////////////////////////////////// Khai Báo Biến Thay Đổi Tên ////////////////////////////////////////////


	$btn_them_active=""; // Nếu $btn_them_active="on" là có sử dụng  
	$btn_hien_active=""; // Nếu $btn_hien_active="on" là có sử dụng  
	$btn_an_active=""; // Nếu $btn_an_active="on" là có sử dụng  
	$btn_xoa_active=""; // Nếu $btn_xoa_active="on" là có sử dụng  
	$check_rating=""; // rating
	$kichthuoc_image=""; // Đặt kích thước ảnh 
	$name_photo=""; // Đặt tiêu đề cho mục hình ảnh
	$name_cap=""; // Đặt tiêu đề cho danh mục và bài viết
	$image_active=""; // Nếu $image_active="on" là có sử dụng add ảnh 

	if ($_GET["com"]=="product" || $_REQUEST['typeparent']=='product' || $_REQUEST['typechild']=='product' || $_REQUEST['typeparent']=='duan' || $_REQUEST['typechild']=='duan' || $_REQUEST['typeparent']=='phukien' || $_REQUEST['typechild']=='phukien' )
	{



		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='product' && ($_GET["act"]=="man_list" ||  $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 100px - Height: 90px";
			$name_cap="Thêm Danh Mục Cấp 1";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='product' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 100px - Height: 90px";
			$name_cap="Sửa Danh Mục Cấp 1";
			$image_active="off";
			
		}



		//Thêm Cấp 2


		if($_REQUEST['typeparent']=='product' && ($_GET["act"]=="man_cat" ||  $_GET["act"]=="add_cat") )
		{

			$kichthuoc_image="Width: 77px - Height: 77px";
			$name_cap="Thêm Danh Mục Sản Phẩm Cấp 2";
			$image_active="on";
			
		}



		//Sửa Cấp 2


		if($_REQUEST['typeparent']=='product' && $_GET["act"]=="edit_cat" )
		{

			$kichthuoc_image="Width: 77px - Height: 77px";
			$name_cap="Sửa Danh Mục Sản Phẩm Cấp 2";
			$image_active="on";
			
		}





		//Thêm Cấp 3


		if($_REQUEST['typeparent']=='product' &&  ($_GET["act"]=="man_item" || $_GET["act"]=="add_item") )
		{

			$kichthuoc_image="Width: 77px - Height: 77px";
			$name_cap="Thêm Danh Mục Sản Phẩm Cấp 3";
			$image_active="on";
			
		}



		//Sửa Cấp 3


		if($_REQUEST['typeparent']=='product' && $_GET["act"]=="edit_item")
		{ 

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Sản Phẩm Cấp 3";
			$image_active="off";
			
		}






		//Thêm Cấp 4


		if($_REQUEST['typeparent']=='product' && ($_GET["act"]=="man_sub" || $_GET["act"]=="add_sub") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Sản Phẩm Cấp 4";
			$image_active="on";
			
		}



		//Sửa Cấp 4


		if($_REQUEST['typeparent']=='product' && $_GET["act"]=="edit_sub")
		{ 

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Sản Phẩm Cấp 4";
			$image_active="on";
			
		}





		//Thêm Danh Sach San Pham


		if($_REQUEST['typechild']=='product' && ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 270px - Height: 235px";
			$name_cap="Thêm Danh Sách ";
			$image_active="on";
			$mutile_image_active="on";

			$check_rating="off";

			$sanpham_active ="on";
			$other_active ="off";
			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="on";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";


			$check_noibat="on";
			$check_new="off";
			$check_km="off";
			$check_bc="off";
			$check_tt="off";

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Sản Phẩm


		if($_REQUEST['typechild']=='product' &&  $_GET["act"]=="edit")
		{ 

			$kichthuoc_image="Width: 270px - Height:235px";
			$name_cap="Sửa Danh Sách";
			$image_active="on";
			$mutile_image_active="on";

			$check_rating="off";

			$sanpham_active ="on";
			$other_active ="off";
			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="on";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";




			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}
	




		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='in-an-product' && ($_GET["act"]=="man_list" ||  $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 394px - Height: 150px";
			$name_cap="Thêm Danh Mục Cấp 1";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='in-an-product' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 394px - Height: 150px";
			$name_cap="Sửa Danh Mục Cấp 1";
			$image_active="off";
			
		}



		//Thêm Cấp 2


		if($_REQUEST['typeparent']=='in-an-product' && ($_GET["act"]=="man_cat" ||  $_GET["act"]=="add_cat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Cấp 2";
			$image_active="off";
			
		}



		//Sửa Cấp 2


		if($_REQUEST['typeparent']=='in-an-product' && $_GET["act"]=="edit_cat" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Cấp 2";
			$image_active="off";
			
		}

		//Thêm Danh Sach San Pham


		if($_REQUEST['typechild']=='in-an-product' && ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 205px - Height: 200px";
			$name_cap="Thêm Danh Sách in ấn";
			$image_active="on";
			$mutile_image_active="on";

			$check_rating="off";

			$sanpham_active ="on";
			$other_active ="off";
			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="on";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";


			$check_noibat="on";
			$check_new="on";
			$check_km="off";
			$check_bc="off";
			$check_tt="off";

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Sản Phẩm


		if($_REQUEST['typechild']=='in-an-product' &&  $_GET["act"]=="edit")
		{ 

			$kichthuoc_image="Width: 205px - Height: 200px";
			$name_cap="Sửa Danh Sách in ấn";
			$image_active="on";
			$mutile_image_active="on";

			$check_rating="off";

			$sanpham_active ="on";
			$other_active ="off";
			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="on";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";




			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}
		
			//Thêm Cấp 1


		if($_REQUEST['typeparent']=='duan' && ($_GET["act"]=="man_list" ||  $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 394px - Height: 150px";
			$name_cap="Thêm Danh Mục Cấp 1";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='duan' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 394px - Height: 150px";
			$name_cap="Sửa Danh Mục Cấp 1";
			$image_active="off";
			
		}

		
		//Thêm Danh Sach San Pham


		if($_REQUEST['typechild']=='duan' && ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 684px - Height: 570px";
			$name_cap="Thêm Danh Sách dự án";
			$image_active="on";
			$mutile_image_active="off";

			$check_rating="off";

			$map_active ="on";
			$other_active ="on";
			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			$danhmuc_thanhpho="on";

			$check_noibat="on";
			$check_new="off";
			$check_km="off";
			$check_bc="off";
			$check_tt="off";

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Sản Phẩm


		if($_REQUEST['typechild']=='duan' &&  $_GET["act"]=="edit")
		{ 

			$kichthuoc_image="WWidth: 684px - Height: 570px";
			$name_cap="Sửa Danh Sách dự án";
			$image_active="on";
			$mutile_image_active="off";

			$check_rating="off";

			$map_active ="on";
			$other_active ="on";
			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			$danhmuc_thanhpho="on";



			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}
	}
		/*********************************Start Danh Muc Tours *******************************************/




	if ($_GET["com"]=="tours" || $_REQUEST['typeparent']=='tours' || $_REQUEST['typechild']=='tours')
	{


		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='tours' && ($_GET["act"]=="man_list" ||  $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tours  Cấp 1";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='tours' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tours  Cấp 1";
			$image_active="off";
			
		}



		//Thêm Cấp 2


		if($_REQUEST['typeparent']=='tours' && ($_GET["act"]=="man_cat" ||  $_GET["act"]=="add_cat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tours  Cấp 2";
			$image_active="on";
			
		}



		//Sửa Cấp 2


		if($_REQUEST['typeparent']=='tours' && $_GET["act"]=="edit_cat" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tours  Cấp 2";
			$image_active="on";
			
		}





		//Thêm Cấp 3


		if($_REQUEST['typeparent']=='tours' &&  ($_GET["act"]=="man_item" || $_GET["act"]=="add_item") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tours  Cấp 3";
			$image_active="off";
			
		}



		//Sửa Cấp 3


		if($_REQUEST['typeparent']=='tours' && $_GET["act"]=="edit_item")
		{ 

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tours  Cấp 3";
			$image_active="off";
			
		}






		//Thêm Cấp 4


		if($_REQUEST['typeparent']=='tours' && ($_GET["act"]=="man_sub" || $_GET["act"]=="add_sub") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tours  Cấp 4";
			$image_active="on";
			
		}



		//Sửa Cấp 4


		if($_REQUEST['typeparent']=='tours' && $_GET["act"]=="edit_sub")
		{ 

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tours  Cấp 4";
			$image_active="on";
			
		}





		//Thêm Danh Sach San Pham


		if($_REQUEST['typechild']=='tours' && ( $_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 600px - Height: 600px";
			$name_cap="Thêm Danh Sách Tours ";
			$image_active="on";
			$mutile_image_active="off";

			$check_rating="on";


			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="on";
			$danhmuc_cap3="on";
			$danhmuc_cap4="off";


			$check_noibat="on";


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			
		}



		//Sửa Danh Sách Tours 


		if($_REQUEST['typechild']=='tours' &&  $_GET["act"]=="edit")
		{ 

			$kichthuoc_image="Width: 600px - Height: 600px";
			$name_cap="Sửa Danh Sách Tours ";
			$image_active="on";
			$mutile_image_active="off";

			$check_rating="on";


			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="on";
			$danhmuc_cap3="on";
			$danhmuc_cap4="off";




			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}
	





	}





		/*********************************End Danh Muc Tours *******************************************/

		

/***********************************************************Start Muc Luc Tin Tức ********************************************/


	if ($_GET["com"]=="news")
	{
		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='goiuudai' &&  ( $_GET["act"]=="man_list" || $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm loại sản phẩm";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='goiuudai' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa loại sản phẩm";
			$image_active="off";
			
		}

		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='news' &&  ( $_GET["act"]=="man_list" || $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tin Cấp 1";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='news' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tin Cấp 1";
			$image_active="off";
			
		}



		//Thêm Cấp 2


		if($_REQUEST['typeparent']=='news' && ( $_GET["act"]=="man_cat" || $_GET["act"]=="add_cat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tin Cấp 2";
			$image_active="on";
			
		}



		//Sửa Cấp 2


		if($_REQUEST['typeparent']=='news' && $_GET["act"]=="edit_cat" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tin Cấp 2";
			$image_active="on";
			
		}





			//Thêm Cấp 3


		if($_REQUEST['typeparent']=='news' && ($_GET["act"]=="man_item" || $_GET["act"]=="add_item") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tin Cấp 3";
			$image_active="on";
			
		}



		//Sửa Cấp 3


		if($_REQUEST['typeparent']=='news' && $_GET["act"]=="edit_item"  )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tin Cấp 3";
			$image_active="on";
			
		}




		//Thêm Cấp 4


		if($_REQUEST['typeparent']=='news' && ( $_GET["act"]=="man_sub" || $_GET["act"]=="add_sub") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Tin Cấp 4";
			$image_active="on";
			
		}



		//Sửa Cấp 4


		if($_REQUEST['typeparent']=='news' && $_GET["act"]=="edit_sub" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Tin Cấp 4";
			$image_active="on";
			
		}



		//Thêm Danh Sách Tin 


		if($_REQUEST['typechild']=='news' && ($_GET["act"]=="man" || $_GET["act"]=="add"))
		{

			$kichthuoc_image="Width: 205px - Height: 205px";
			$name_cap="Thêm Danh Sách Tin";
		

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Trang trong"; 

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			
			$image_active ="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";
			$noidungthem_active="off";
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='news' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Tin";
			
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$image_active="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";
			$noidungthem_active="off";
			
		}
		
		//Thêm Danh Sách Tin 


		if($_REQUEST['typechild']=='in-an-news' && ($_GET["act"]=="man" || $_GET["act"]=="add"))
		{

			$kichthuoc_image="Width: 205px - Height: 205px";
			$name_cap="Thêm Danh Sách Tin";
		

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			
			$image_active ="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";
			$noidungthem_active="off";
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='in-an-news' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Tin";
			
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$image_active="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";
			$noidungthem_active="off";
			
		}

		
				//Thêm Danh Sách Tin 


		if($_REQUEST['typechild']=='container' &&( $_GET["act"]=="man" || $_GET["act"]=="add"))
		{

			$kichthuoc_image="Width: 205px - Height: 205px";
			$name_cap="Thêm loại container";
		

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			
			$image_active ="off";
			$mutile_image_active="on";

			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="on";
			
		}



		//Sửa Danh Sách Tin 


			if($_REQUEST['typechild']=='container' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa loại container";
			
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$image_active="off";
			$mutile_image_active="on";


			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="on";
			
		}

				//Thêm Danh Sách Tin 


		if($_REQUEST['typechild']=='chatlieu' &&( $_GET["act"]=="man" || $_GET["act"]=="add"))
		{

			$kichthuoc_image="Width: 205px - Height: 205px";
			$name_cap="Thêm chất liệu";
		

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			
			$image_active ="off";
			$mutile_image_active="on";

			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="on";
			
		}



		//Sửa Danh Sách Tin 


			if($_REQUEST['typechild']=='chatlieu' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa chất liệu";
			
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$image_active="off";
			$mutile_image_active="on";


			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="on";
			
		}
		
				//Thêm Danh Sách Tin 


		if($_REQUEST['typechild']=='trangbi' && ($_GET["act"]=="man" || $_GET["act"]=="add"))
		{

			$kichthuoc_image="Width: 205px - Height: 205px";
			$name_cap="Thêm trang bị";
		

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			
			$image_active ="off";
			$mutile_image_active="on";

			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="on";
			
		}



		//Sửa Danh Sách Tin 


			if($_REQUEST['typechild']=='trangbi' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa trang bị";
			
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$image_active="off";
			$mutile_image_active="on";


			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="on";
			
		}
		
		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='noithat' &&  ( $_GET["act"]=="man_list" || $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục nội thất Cấp 1";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='noithat' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục nội thất Cấp 1";
			$image_active="off";
			
		}
		
				//Thêm Danh Sách Tin 


		if($_REQUEST['typechild']=='noithat' && ($_GET["act"]=="man" || $_GET["act"]=="add"))
		{

			$kichthuoc_image="Width: 205px - Height: 205px";
			$name_cap="Thêm nội thất";
		

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 

			$danhmuc_cap1="on";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			
			$image_active ="off";
			$mutile_image_active="on";

			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="on";
			
		}



		//Sửa Danh Sách Tin 


			if($_REQUEST['typechild']=='noithat' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa nội thất";
			
			$danhmuc_cap1="on";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$image_active="off";
			$mutile_image_active="on";


			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="on";
			
		}
		
				//Thêm Danh Sách Tin 


		if($_REQUEST['typechild']=='thietke' && ($_GET["act"]=="man" || $_GET["act"]=="add"))
		{

			$kichthuoc_image="Width: 205px - Height: 205px";
			$name_cap="Thêm thiết kế nội thất";
		

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			
			$image_active ="off";
			$mutile_image_active="on";

			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="on";
			
		}



		//Sửa Danh Sách Tin 


			if($_REQUEST['typechild']=='thietke' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa thiết kế nội thất";
			
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$image_active="off";
			$mutile_image_active="on";


			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="on";
			
		}

	}


	/***********************************************************End Muc Luc Tin Tức ********************************************/



/***********************************************************Start Muc Luc Cập Nhật Nhiều Bài Viết ********************************************/	


	if ($_GET["com"]=="news"  )
	{


		//Thêm Danh Sách Tin 

		if($_REQUEST['typechild']=='khuyenmai' && ($_GET["act"]=="man" || $_GET["act"]=="add") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Khuyến Mãi";


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			
			$image_active ="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='khuyenmai' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Khuyến Mãi";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$image_active="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";

			



			
		}











		//Thêm Danh Sách Tin 
		
		if($_REQUEST['typechild']=='tuyendung' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Tuyển Dụng";
			
			$image_active ="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";
			$noidungthem_active="off";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='tuyendung' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Tuyển Dụng";
			
			$image_active="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";
			$noidungthem_active="off";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}


		//Thêm Danh Sách Tin 
		
		if($_REQUEST['typechild']=='in-an-tuyendung' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Tuyển Dụng";
			
			$image_active ="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";
			$noidungthem_active="off";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='in-an-tuyendung' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Tuyển Dụng";
			
			$image_active="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";
			$noidungthem_active="off";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}





		//Thêm Danh Sách Tin 

		if($_REQUEST['typechild']=='uudai' && ($_GET["act"]=="man" || $_GET["act"]=="add") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm bài viết";


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";
			
			$image_active ="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='uudai' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa bài viết";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$image_active="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";

			



			
		}








		//Thêm Danh Sách Tin

		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='gioithieu' &&  ( $_GET["act"]=="man_list" || $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Cấp 1";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='gioithieu' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Cấp 1";
			$image_active="off";
			
		}	
		
		if($_REQUEST['typechild']=='gioithieu' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 580px - Height: 360px";
			$name_cap="Thêm Bài giới thiệu";
			
			$image_active ="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='gioithieu' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 580px - Height: 360px";
			$name_cap="Sửa Danh Sách Bài giới thiệu";
			
			$image_active="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}


                    //Thêm Danh Sách dịch vụ 
		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='dichvu' &&  ( $_GET["act"]=="man_list" || $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 260px - Height: 260px";
			$name_cap="Thêm Danh Mục Cấp 1";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='dichvu' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 260px - Height: 260px";
			$name_cap="Sửa Danh Mục Cấp 1";
			$image_active="off";
			
		}



		//Thêm Cấp 2


		if($_REQUEST['typeparent']=='dichvu' && ( $_GET["act"]=="man_cat" || $_GET["act"]=="add_cat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục dịch vụ Cấp 2";
			$image_active="off";
			
		}



		//Sửa Cấp 2


		if($_REQUEST['typeparent']=='dichvu' && $_GET["act"]=="edit_cat" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục dịch vụ Cấp 2";
			$image_active="off";
			
		}			
		
		if($_REQUEST['typechild']=='dichvu' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width:270px - Height: 270px";
			$name_cap="Thêm Bài viết";
			
			$image_active ="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";
			$noidungthem_active="off";
			
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách dich vụ 


		if($_REQUEST['typechild']=='dichvu' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width:270px - Height: 270px";
			$name_cap="Sửa Danh Sách Bài viết";
			
			$image_active="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";
			$noidungthem_active="off";
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}

                 //Thêm Danh Sách công trình
		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='congtrinh' &&  ( $_GET["act"]=="man_list" || $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục công trình Cấp 1";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='congtrinh' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục công trình Cấp 1";
			$image_active="off";
			
		}		 
		
		if($_REQUEST['typechild']=='congtrinh' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Bài công trình";
			
			$image_active ="on";
			$mutile_image_active="on";

			$thongtinthem_active ="on";
			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách công trình 


		if($_REQUEST['typechild']=='congtrinh' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Bài công trình";
			
			$image_active="on";
			$mutile_image_active="on";
			$thongtinthem_active ="on";	
			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}
                
                 //Thêm Danh Sách tư vấn 
		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='duan' &&  ( $_GET["act"]=="man_list" || $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục dự án Cấp 1";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='duan' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục dự án cấp 1";
			$image_active="off";
			
		}
		 
		
		if($_REQUEST['typechild']=='duan' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Bài dự án";
			
			$image_active ="on";
			$mutile_image_active="on";
			
			$thongtinthem_active ="off";
			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách tư vấn 


		if($_REQUEST['typechild']=='duan' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Bài dự án";
			
			$image_active="on";
			$mutile_image_active="on";
			$thongtinthem_active ="off";
			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}
		
		         //Thêm Danh Sách tư vấn 
		//Thêm Cấp 1


		if($_REQUEST['typeparent']=='hoatdong' &&  ( $_GET["act"]=="man_list" || $_GET["act"]=="add_list") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục Cấp 1";
			$image_active="off";
			
		}



		//Sửa Cấp 1


		if($_REQUEST['typeparent']=='hoatdong' && $_GET["act"]=="edit_list" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục Cấp 1";
			$image_active="off";
			
		}
		
		if($_REQUEST['typeparent']=='news' && ( $_GET["act"]=="man_cat" || $_GET["act"]=="add_cat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Danh Mục cho thuê xe Cấp 2";
			$image_active="off";
			
		}



		//Sửa Cấp 2


		if($_REQUEST['typeparent']=='news' && $_GET["act"]=="edit_cat" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Mục cho thuê xe Cấp 2";
			$image_active="off";
			
		}
		 
		
		if($_REQUEST['typechild']=='hoatdong' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Bài viết";
			
			$image_active ="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách tư vấn 


		if($_REQUEST['typechild']=='hoatdong' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Bài viết";
			
			$image_active="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="on";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}
		
		         //Thêm Danh Sách bác sĩ 
		
		if($_REQUEST['typechild']=='tailieu' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm thông tin bài viết";
			
			$image_active ="on";
			$mutile_image_active="off";
			$tailieu_active="off";	

			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách bác sĩ 


		if($_REQUEST['typechild']=='tailieu' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách bài viết";
			
			$image_active="on";
			$mutile_image_active="off";
			$tailieu_active="off";	
			
			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

	
		}
		
		         //Thêm Danh Sách khách hàng
		
		if($_REQUEST['typechild']=='khachhang' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm thông tin khách hàng";
			
			$image_active ="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách bác sĩ 


		if($_REQUEST['typechild']=='khachhang' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách khách hàng";
			
			$image_active="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

	
		}
		
		         //Thêm Danh Sách chinhsach
		
		if($_REQUEST['typechild']=='chinhsach' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm chính sách";
			
			$image_active ="off";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách chính sách 


		if($_REQUEST['typechild']=='chinhsach' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách chính sách";
			
			$image_active="off";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

	
		}
		
		         //Thêm Danh Sách cau hoi
		
		if($_REQUEST['typechild']=='cauhoi' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm câu hỏi";
			
			$image_active ="off";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="off";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách câu hỏi 


		if($_REQUEST['typechild']=='cauhoi' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách cạu hỏi";
			
			$image_active="off";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

	
		}
		
			if($_REQUEST['typechild']=='dambao' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm bài viết";
			
			$image_active ="on";
			$mutile_image_active="off";


			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách câu hỏi 


		if($_REQUEST['typechild']=='dambao' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách";
			
			$image_active="on";
			$mutile_image_active="off";

			$mota_active ="on";
			$noidung_active="on";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

	
		}
				         //Thêm Danh Sách bộ sưu tập
		
		if($_REQUEST['typechild']=='bosuutap' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 575px - Height: 385px";
			$name_cap="Thêm thư viện";
			
			$image_active ="on";
			$mutile_image_active="on";


			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="off";
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách tư vấn 


		if($_REQUEST['typechild']=='bosuutap' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 575px - Height: 385px";
			$name_cap="Sửa Danh Sách thư viện";
			
			$image_active="on";
			$mutile_image_active="on";

			$mota_active ="on";
			$noidung_active="off";
			$noidungthem_active="off";
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}
		
			if($_REQUEST['typechild']=='chinhanh' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 280px - Height: 255px";
			$name_cap="Thêm Bài viết";
			
			$image_active ="off";
			$mutile_image_active="off";


			$mota_active ="off";
			$noidung_active="on";
			$noidungthem_active="off";
			
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";

			$check_tinnoibat="on";
			$rename_tinnoibat="Tin nổi bật";

			$check_tinmoi="off"; 
			$rename_tinmoi="Tin mới"; 


			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách dich vụ 


		if($_REQUEST['typechild']=='chinhanh' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 280px - Height:255px";
			$name_cap="Sửa Danh Sách Bài viết";
			
			$image_active="off";
			$mutile_image_active="off";

			$mota_active ="off";
			$noidung_active="on";
			$noidungthem_active="off";
			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}

	}



/***********************************************************End Muc Luc Cập Nhật Nhiều Bài Viết ********************************************/	



	/***********************************************************Start Muc Luc Cập Nhật 1 Bài Viết ********************************************/


	if ($_GET["com"]=="info")
	{


		// Cập nhật 1 bài viết
		if($_REQUEST['typechild']=='inheader' && ($_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Nội dung in trên header";
			$image_active="off";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="on";
			
		}
		if($_REQUEST['typechild']=='infooter' && ($_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Nội dung in dưới footer";
			$image_active="off";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="on";
			
		}
		
		if($_REQUEST['typechild']=='dangky' && ($_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Đăng ký khóa học";
			$image_active="off";
			$tieude_active="on";
			$mota_active="on";
			$noidung_active="off";
			
		}
		
		if($_REQUEST['typechild']=='thanhtoan' && ($_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thanh toán";
			$image_active="off";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="on";
			
		}

		if($_REQUEST['typechild']=='gioithieu' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 605px - Height:400px";
			$name_cap="Giới thiệu (Seo)";
			$image_active="on";
			$tieude_active="on";
			$mota_active="on";
			$noidung_active="on";
			
		}
		if($_REQUEST['typechild']=='product' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 545px - Height: 340px";
			$name_cap="Sản phẩm (Seo)";
			$image_active="on";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="off";
			
		}
		
		if($_REQUEST['typechild']=='dichvu' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 545px - Height: 340px";
			$name_cap="Dịch vụ (Seo)";
			$image_active="on";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="off";
			
		}
		if($_REQUEST['typechild']=='tailieu' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 545px - Height: 340px";
			$name_cap="Đào tạo(Seo)";
			$image_active="off";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="off";
			
		}
		if($_REQUEST['typechild']=='news' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 545px - Height: 340px";
			$name_cap="Tin tức (Seo)";
			$image_active="on";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="off";
			
		}
		
		if($_REQUEST['typechild']=='baohanh' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 545px - Height: 340px";
			$name_cap="Bảo hành (Seo)";
			$image_active="off";
			$tieude_active="on";
			$mota_active="off";
			$noidung_active="on";
			
		}
		if($_REQUEST['typechild']=='hinhanh' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 545px - Height: 340px";
			$name_cap="Thư viện ảnh (Seo)";
			$image_active="on";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="off";
			
		}
                
				
				if($_REQUEST['typechild']=='visao' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Vì sao chọn chúng tôi";
			$image_active="off";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="on";
			
		}
                if($_REQUEST['typechild']=='phanphoi' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thông tin chuyển khoản";
			$image_active="off";
			$tieude_active="on";
			$mota_active="off";
			$noidung_active="on";
			
		}
                if($_REQUEST['typechild']=='doingu' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Hợp tác";
			$image_active="off";
			$tieude_active="on";
			$mota_active="off";
			$noidung_active="on";
			
		}
                
		if($_REQUEST['typechild']=='intro' && ($_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Footer intro";
			$image_active="off";
			$tieude_active="on";
			$mota_active="off";
			$noidung_active="on";
			
		}

		if($_REQUEST['typechild']=='footer' && ($_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Footer";
			$image_active="off";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="on";
			
		}
		
		if($_REQUEST['typechild']=='thoigian' && ($_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thời gian mở cửa";
			$image_active="off";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="on";
			
		}



		if($_REQUEST['typechild']=='lienhe' && ($_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Liên hệ";
			$image_active="off";
			$tieude_active="off";
			$mota_active="off";
			$noidung_active="on";
			
		}



		


	}
			
	
	/***********************************************************END Muc Luc Cập Nhật Bài Viết ********************************************/




	/***********************************************************Start Muc Luc Hình ảnh và Link ********************************************/





	if ($_GET["com"]=="image_url")
	{
		if($_REQUEST['typechild']=='bct')
		{
			$kichthuoc_image="Width: auto - Height: auto";
			$name_photo="Hình bộ công thương";

			$mota_active="off";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}	
		if($_REQUEST['typechild']=='hinhanh')
		{
			$kichthuoc_image="Width: auto - Height: auto";
			$name_photo="Hình ảnh ";

			$mota_active="off";
			$link_active="off";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}

        if($_REQUEST['typechild']=='quangcao')
		{
			$kichthuoc_image="Width: 1366px - Height: 360px";
			$name_photo="Banner quảng cáo";

			$mota_active="off";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
		 if($_REQUEST['typechild']=='in-an-quangcao')
		{
			$kichthuoc_image="Width: auto - Height: auto";
			$name_photo="Banner quảng cáo";

			$mota_active="off";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
		 if($_REQUEST['typechild']=='quangcao1')
		{
			$kichthuoc_image="Width: auto - Height: auto";
			$name_photo="Banner quảng cáo 1";

			$mota_active="off";
			$link_active="off";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
		 if($_REQUEST['typechild']=='quangcao2')
		{
			$kichthuoc_image="Width: auto - Height: auto";
			$name_photo="Banner quảng cáo 2";

			$mota_active="off";
			$link_active="off";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}

		if($_REQUEST['typechild']=='linkmenu')
		{
			$kichthuoc_image="Width: 1366px - Height: 900px";
			$name_photo="Back Link Menu";

			$mota_active="off";
			$link_active="on";
			$image_active="off";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}	


		if($_REQUEST['typechild']=='dichvukhac')
		{
			$kichthuoc_image="Width: 1366px - Height: 900px";
			$name_photo="Back LinK Dịch Vụ Khác";
			
			$mota_active="off";
			$link_active="on";
			$image_active="off";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}	



		if($_REQUEST['typechild']=='slider')
		{
			$kichthuoc_image="Width: 1366px - Height: 575px";
			$name_photo="Slide Show";

			$mota_active="on";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}if($_REQUEST['typechild']=='sliderintro')
		{
			$kichthuoc_image="Width: auto - Height: auto";
			$name_photo="Slide Show intro";

			$mota_active="off";
			$link_active="off";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
		if($_REQUEST['typechild']=='in-an-slider')
		{
			$kichthuoc_image="Width: 1366px - Height: 475px";
			$name_photo="Slide Show";

			$mota_active="on";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}			


		if($_REQUEST['typechild']=='doitac')
		{
			$kichthuoc_image="Width: 188px - Height: 98px";
			$name_photo="Đối tác";

			$mota_active="off";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
		if($_REQUEST['typechild']=='in-an-doitac')
		{
			$kichthuoc_image="Width: 188px - Height: 98px";
			$name_photo="Đối tác";

			$mota_active="off";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}			


		if($_REQUEST['typechild']=='mangxahoi')
		{
			$kichthuoc_image="Width: 40px - Height: 40px";
			$name_photo="Mạng Xã Hội";
			$image_active="on";

			$mota_active="off";
			$link_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}	
		if($_REQUEST['typechild']=='mangxahoift')
		{
			$kichthuoc_image="Width: 40px - Height: 40px";
			$name_photo="Mạng Xã Hội footer";
			$image_active="on";

			$mota_active="off";
			$link_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}

			if($_REQUEST['typechild']=='in-an-mangxahoi')
		{
			$kichthuoc_image="Width: 40px - Height: 40px";
			$name_photo="Mạng Xã Hội";
			$image_active="on";

			$mota_active="off";
			$link_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}	
		if($_REQUEST['typechild']=='in-an-mangxahoift')
		{
			$kichthuoc_image="Width: 40px - Height: 40px";
			$name_photo="Mạng Xã Hội footer";
			$image_active="on";

			$mota_active="off";
			$link_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}	



		if($_REQUEST['typechild']=='slideabout')
		{
			$kichthuoc_image="Width: 445px - Height: 445px";
			$name_photo="Slide giới thiệu";
			$image_active="on";

			$mota_active="off";
			$link_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}	


		if($_REQUEST['typechild']=='congtrinh')
		{
			$kichthuoc_image="Width:auto - Height:auto";
			$name_photo="Slide Show";

			$mota_active="off";
			$link_active="off";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
		
		if($_REQUEST['typechild']=='product')
		{
			$kichthuoc_image="Width: 1366px - Height: 250px";
			$name_photo="Slide Show";

			$mota_active="on";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}

		if($_REQUEST['typechild']=='dichvu')
		{
			$kichthuoc_image="Width: 1366px - Height: 250px";
			$name_photo="Slide Show";

			$mota_active="on";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
		
		if($_REQUEST['typechild']=='duan')
		{
			$kichthuoc_image="Width: 1366px - Height: 250px";
			$name_photo="Slide Show";

			$mota_active="on";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
		
		if($_REQUEST['typechild']=='tuyendung')
		{
			$kichthuoc_image="Width: 1366px - Height: 250px";
			$name_photo="Slide Show";

			$mota_active="on";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
		
		if($_REQUEST['typechild']=='news')
		{
			$kichthuoc_image="Width: 1366px - Height: 250px";
			$name_photo="Slide Show";

			$mota_active="on";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
		
		if($_REQUEST['typechild']=='lienhe')
		{
			$kichthuoc_image="Width: 1366px - Height: 250px";
			$name_photo="Slide Show";

			$mota_active="on";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
		
		if($_REQUEST['typechild']=='chinhsach')
		{
			$kichthuoc_image="Width: 1366px - Height: 250px";
			$name_photo="Slide Show chính sách";

			$mota_active="on";
			$link_active="on";
			$image_active="on";

			$btn_them_active="on";
			$btn_hien_active="on";
			$btn_an_active="on";
			$btn_sua_active="on"; 
			$btn_xoa_active="on";
		}
	}	


	/***********************************************************END Muc Luc Cập Nhật Bài Viết ********************************************/







	/***********************************************************Start Muc Bản Đồ ********************************************/





	//Thêm Danh Sách Map 
		
		if($_REQUEST['typechild']=='bando' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Bản đồ";
			
			$image_active ="off";
			$mutile_image_active="off";

			$toado_active="on";

			$mota_active ="off";
			$noidung_active="off";

			$btn_them_active="on";  
			$btn_hien_active="off"; 
			$btn_an_active="off"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='bando' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Bản đồ";
			
			$image_active="off";
			$mutile_image_active="off";

			$toado_active="on";

			$mota_active ="off";
			$noidung_active="off";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}


	/***********************************************************END Muc Bản Đồ ********************************************/





	/***********************************************************Start Muc Video ********************************************/





	//Thêm Danh Sách Video
		
		if($_REQUEST['typechild']=='video' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Video";
			
			$image_active ="off";
			$mutile_image_active="off";

			$link_active="on";

			$mota_active ="off";
			$noidung_active="off";

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='video' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Video";
			
			$image_active="off";
			$mutile_image_active="off";

			$link_active="on";

			$mota_active ="off";
			$noidung_active="off";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}
		
	//Thêm Danh Sách Video
		
		if($_REQUEST['typechild']=='in-an-video' &&  ($_GET["act"]=="man" || $_GET["act"]=="add" ) )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Thêm Video";
			
			$image_active ="off";
			$mutile_image_active="off";

			$link_active="on";

			$mota_active ="off";
			$noidung_active="off";

			$btn_them_active="on";  
			$btn_hien_active="on"; 
			$btn_an_active="on"; 
			$btn_sua_active="on"; 
			$btn_xoa_active="on"; 
			
		}



		//Sửa Danh Sách Tin 


		if($_REQUEST['typechild']=='in-an-video' && $_GET["act"]=="edit" )
		{

			$kichthuoc_image="Width: 240px - Height: 165px";
			$name_cap="Sửa Danh Sách Video";
			
			$image_active="off";
			$mutile_image_active="off";

			$link_active="on";

			$mota_active ="off";
			$noidung_active="off";

			$danhmuc_cap1="off";
			$danhmuc_cap2="off";
			$danhmuc_cap3="off";
			$danhmuc_cap4="off";



			
		}	


	/***********************************************************END Muc Video ********************************************/


	

	/***********************************************************Start Background ********************************************/

	if ($_GET["com"]=="background")
	{


		// Cập nhật BG WEB 

		if($_REQUEST['typechild']=='bg_header' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 1366px - Height: 575px";
			$name_cap="Background Header";
			
			
		}


		if($_REQUEST['typechild']=='bg_footer' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 1366px - Height: 560px";
			$name_cap="Background Footer";
			
			
		}

	}
	
		if ($_GET["com"]=="banner")
	{


	

		if($_REQUEST['typechild']=='banner_top' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 155px - Height: 160px";
			$name_cap="Logo";
			
			
		}
		
		if($_REQUEST['typechild']=='banner_giua' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 1366px - Height: 130px";
			$name_cap="Banner";
			
			
		}

		
		if($_REQUEST['typechild']=='banner_phai' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: auto - Height: auto";
			$name_cap="Banner mobile";
			
			
		}
		
		
		if($_REQUEST['typechild']=='in-an-banner_top' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 155px - Height: 144px";
			$name_cap="Logo";
			
			
		}
		
		if($_REQUEST['typechild']=='in-an-banner_giua' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 1366px - Height: 145px";
			$name_cap="Banner";
			
			
		}

		
		if($_REQUEST['typechild']=='in-an-banner_phai' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: auto - Height: auto";
			$name_cap="Banner mobile";
			
			
		}

		
		if($_REQUEST['typechild']=='logointro' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 395px - Height: 345px";
			$name_cap="Logo intro";
			
			
		}
		
		if($_REQUEST['typechild']=='logoinan' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 285px - Height: 285px";
			$name_cap="Logo in ấn";
			
			
		}
		
		if($_REQUEST['typechild']=='logocamera' && ( $_GET["act"]=="man" || $_GET["act"]=="capnhat") )
		{

			$kichthuoc_image="Width: 285px - Height: 285px";
			$name_cap="Logo camera";
			
			
		}


	}

?>