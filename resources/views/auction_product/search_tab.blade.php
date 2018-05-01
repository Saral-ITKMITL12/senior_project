

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <form method="GET" action="{{ route('donate.search') }}">
  <div class="form-group mr-4 ml-2">
      <input type="text" name="search" class="form-control " placeholder="Enter Product Name For Search" value="{{ old('search') }}">
  </div>
  <div class="form-group" align="center">
      <button class="btn btn-success" >Search</button>
  </div>
  </form>
  <form>
    <div class="row">
      <input type="radio" class="col-2 mt-3 ml-auto" name="category" value="" checked> <a class="col-9" href="auction_product/">สินค้าทั้งหมด</a><br>  </div>
      <div class="row">
      <input type="radio" class="col-2 mt-3 ml-auto" name="category" value="อุปกรณ์การเรียนเฉพาะทาง" > <a class="col-9" href="auction_category/อุปกรณ์การเรียนเฉพาะทาง">อุปกรณ์การเรียนเฉพาะทาง</a><br>  </div>
      <div class="row">
      <input type="radio" class="col-2 mt-3 ml-auto" name="category" value="ของใช้ภายในหอพัก"> <a class="col-9" href="auction_category/ของใช้ภายในหอพัก">ของใช้ภายในหอพัก</a><br></div>
      <div class="row">
      <input type="radio" class="col-2 mt-3 ml-auto" name="category" value="อุปกรณ์ไอที"> <a class="col-9" href="auction_category/อุปกรณ์ไอที">อุปกรณ์ไอที</a><br></div>
      <div class="row">
      <input type="radio" class="col-2 mt-3 ml-auto" name="category" value="หนังสือเรียนและชีทสรุป"> <a class="col-9" href="auction_category/หนังสือเรียนและชีทสรุป">หนังสือเรียนและชีทสรุป</a><br></div>
      <div class="row">
      <input type="radio" class="col-2 mt-3 ml-auto" name="category" value="อุปกรณ์กีฬา"> <a class="col-9" href="auction_category/อุปกรณ์กีฬา">อุปกรณ์กีฬา</a><br></div>
      <div class="row">
      <input type="radio" class="col-2 mt-3 ml-auto" name="category" value="เครื่องดนตรี"> <a class="col-9" href="auction_category/เครื่องดนตรี">เครื่องดนตรี</a><br></div>
      <div class="row">
      <input type="radio" class="col-2 mt-3 ml-auto" name="category" value="อื่นๆ"> <a class="col-9" href="auction_category/อื่นๆ">อื่นๆ</a><br></div>

</form>
</div>
<span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776;ค้นหาสิ่งของ</span>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "275px";
    document.getElementById("main").style.marginLeft = "200px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
