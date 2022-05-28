<meta charset="UTF-8">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(drawVisualization);
     function drawVisualization() {
		 				// cần phải có datatable(cột, dòng)
             var datenhh=0;
             var soluong=0;
             var rows=new Array();
             var data=new google.visualization.DataTable();
            // qua bên model viết câu truy vấn lấy được tên hàng và số lượng bán
            var tenhh=new Array();
            var soluongban=new Array();
             // data này là cái bảng đc tạo ra nhưng nó chưa có dòng và cột
             // tiến hành tạo dòng bằng các truy vấn trong data
             // thống kê tất cả các mặt
             <?php
              $hh =new HangHoa();
              $result=$hh->getListThongKeSLB();
              while($set=$result->fetch())
              {
                $tenhh=$set['tenhh'];
                $slb=$set['soluongban'];
                echo "tenhh.push('".$tenhh."');";
                echo "soluongban.push('".$slb."');";
              }
              //tenhh[Dép Quai Chữ V Đan Chéo Vân Cá Sấu,giày búp bê,Giày Búp Bê Đính Nơ Phối Họa Tiết Nhiệt Đới...]
              //soluongban[44,17,6...]
             ?>
             // sau đó tạo dòng
             for(var i=0;i<tenhh.length;i++)
              {
                datenhh=tenhh[i];
                soluong=parseInt(soluongban[i]);
                rows.push([datenhh,soluong]);
              }
            data.addColumn('string','Hàng Hóa');
            data.addColumn('number','Số lượng bán');
            data.addRows(rows)
             // option tùy chỉnh để vẽ biểu đồ
             var option={
              title:'Thống kê số lượng các mặt hàng được bán',
              'width':900,
              'height':400,
              'backgroundColor':'#ffffff',
              is3D:true
            };
            // bước cuối cùng là vẽ biểu đồ chart.draw
            var chart=new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data,option);
	 }
    </script>
        <div class="thongke">
        <div style=" width:100%;  float: left;"   id="chart_div">dfsf</div>
        
      </div>