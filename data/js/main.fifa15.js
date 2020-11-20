var selectedPlayers = [];
function include(arr,obj) {
return (arr.indexOf(obj) != -1);
}


$(document).on('click', '#clos-player-area', function () {
	$('#arigrok').val('');
	$('.player-area').empty();
});
	
$(document).ready(function(){
$('#arigrok').val('');
	
function call_check_summ() {
					var summa = 0;
					$('.select-players .player .max-price').each(function() {
						summa = summa + parseInt($(this).val());
					});
					//alert(summa);
					$('span.summa').text(summa);
}
							
				
function read_players(query)  {
					$('.player-area').empty();
					var textplaer='<h3 id="textplaer">Загружаю список</h3>';
					var imgclos='<img src="images/close.png" id="clos-player-area"/>';
					$('.player-area').append(textplaer);
					$('.player-area').append(imgclos);
					$.ajax({
						url: '/parserfifa/ajax.php?query='+query,
						success: function(data) {
							console.log(data);
							var objs = JSON.parse(data);
							for (var i = 0; i < objs.length; i++){	
								var block = '<div class="player" data-id="'+objs[i]['id']+'"><img class="player-photo" src="/parserfifa/fifa/15/players/photo/'+objs[i]['photo']+'" width="40px"><img class="player-country" src="/parserfifa/fifa/15/players/country/'+objs[i]['country']+'" width="40px"><span class="player-rating">'+objs[i]['rating']+'</span><span class="player-name">'+objs[i]['name']+'</span></div>';
								$('.player-area ').append(block);
							}	
		$('#textplaer').text('Список игроков');
						}
					});
					
}
				
var countchar=0;								
$(document).on('input', '.input-player', function () {
	countchar=$(this).val().length;
		$('#test').text('countchar--'+countchar);
	if(countchar>1){
					//реагирует на любое изменение
					var $item = $(this),
					value = $item.val();
					read_players(value);
					}
});
				
				
				
$(".delete-button").click(function(){
					//Удаляем нашего родителя.
					//	$(this).parent().remove();
					//selectedPlayers.remove('bar');
})
				
				
				
$(document).on('click', '.delete-button', function(){
					var self_obj = $(this);
					var id = parseInt(self_obj.data('id'));
					selectedPlayers.splice(selectedPlayers.indexOf(id), 1);
					$(this).parent().remove();
	var intplayr=$('.player .max-price');
	var summax=0;
	for(i=0;i<(intplayr.length);i++){
	summax=parseInt(summax)+parseInt(intplayr.eq(i).val());
	}
  $('[name = calc1]').val(summax);
  $('[name = calc1]').keyup();
summax=0;
					//call_check_summ();
})
				
				
$(document).on('change', '.min-price, .max-price, .gold_game_selection', function(){
    var intplayr=$('.player .max-price');
	var summax=0;
for(i=0;i<(intplayr.length);i++){
	summax=parseInt(summax)+parseInt(intplayr.eq(i).val());
	var newnumigrok=$('.player .newigroknam').eq(i).attr('name').split(')',1).toString();
	
	var nm=$('.player .newigroknam').eq(i).attr('name').replace(new RegExp(newnumigrok,'g'),i+1);
	//$('#test2').html($('#test2').html()+'<br>'+newnumigrok+'--nm= '+nm+'--i='+i);
	$('.player .newigroknam').eq(i).attr('name',nm);
}
  $('[name = calc1]').val(summax);
  $('[name = calc1]').keyup();
summax=0;
					call_check_summ();// вызвать пересчет суммы.
	var nameigrokar=$(this).parent('.player').find('.newigroknam').attr('name');
	nameigrok = nameigrokar.split(',',1);
	nameigrok= nameigrok+',';
nameigrok= nameigrok +' мин.: '+$(this).parent('.player').find('.min-price').val();	nameigrok= nameigrok +' макс.: '+$(this).parent('.player').find('.max-price').val();
nameigrok= nameigrok +' '+$(this).parent('.player').find('.gold_game_selection').val();

$(this).parent('.player').find('.newigroknam').attr('name',nameigrok);
//$('#test').text(nameigrok);

})
				
var numigrok=0;				
$(document).on('click', '.player-area .player', function(){
	numigrok++;
					//клонируем, заменяем и добавляем игрока в поле заказа
					var template = $(".select-players .player-template").clone();;
					var self_obj = $(this);
					var id = parseInt(self_obj.data('id'));
					var photo = self_obj.find('.player-photo').attr('src');
					var country  = self_obj.find('.player-country').attr('src');
					var rating  = self_obj.find('.player-rating').html();
					var name  = self_obj.find('.player-name').html();
					// $(template).attr('src', '...');
 					$(template).removeClass('player-template').addClass('player');
					$(template).attr('data-id', id);
				  	$(template).find('.player-photo').attr('src', photo);
				  	$(template).find('.player-country').attr('src', country);
					$(template).find('.player-rating').html(rating);
					$(template).find('.player-name').html(name);
$(template).find('.newigroknam').attr('name', numigrok+') '+name+' '+'рейтинг игрока '+rating+',');

					 	$('.select-players').append(template);
						
						console.log(selectedPlayers);
					
})
				
				
$(document).on('click', '.player', function(){
					var id = $(this).data("id");
					//alert(id);
})
// если нет игроков
$(document).on('mouseover', '.btn', function(){
 if($('.player').length<1){
     alert('Выберите хотя бы одного игрока');
 }
})
$(document).on('click', '.btn', function(){
 $('.player-template').remove();
})

})
			
			