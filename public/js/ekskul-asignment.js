function addElement(){
    //const parent = document.getElementsByClassName("ekskul-item");
    
    /*var el = document.createElement("div");
    el.innerHTML = "test";
    var div = document.getElementsByClassName("ekskul-item");
    div.parentNode.insertBefore(el, div.nextSibling);*/

    // const node = document.getElementsByClassName("ekskul-item").lastChild;

    const node = Array.from(
        document.getElementsByClassName('ekskul-item')
      ).pop();

    const clone = node.cloneNode(true);
    document.getElementsByClassName("parent")[0].appendChild(clone);

    const EllastNumber = Array.from(
        document.getElementsByClassName('number-item')
    ).pop();
    EllastNumber.innerText = parseInt(EllastNumber.innerText) + 1;

    const lastPriceBox = Array.from(
        document.getElementsByName('price[]')
    ).pop();
    lastPriceBox.value = 0;

}

function setEkskulPrice(item){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var formData = {
      id_ekskul: item.value,
  };
  
  console.log($(item).closest('div').next().find('input[name="price[]"]'));
 
  $.ajax({
    type:'POST',
    url:'/ekskul-get-price',
    data: formData,
    dataType: 'json',
    success:function(data) {
       console.log(data.ekskul_list.price);
       $(item).closest('div').next().find('input[name="price[]"]').val(data.ekskul_list.price);
       calculatePrice();
    }
 });
}

function calculatePrice(){
  const list = document.getElementsByName("price[]");
  let totalPrice = 0;

  list.forEach(element => {
    totalPrice = totalPrice + parseInt(element.value);
  });

  document.getElementsByClassName('total-label')[0].innerText = totalPrice;
  

}