<style>
.box{
	box-shadow:0px 0px 10px #cc0000;
	min-height:260px;
	padding:10px;
	overflow-y:auto;
	background:#fff;
}
</style>
<?php
	include('./class.php');
	global $pdo;
	session_start();
	if(isset($_SESSION['userid']))
	{
		$id = htmlspecialchars(stripslashes($_SESSION['userid']));
		$user = $pdo->query("select * from record where id = '$id'");
		$row = $user->fetch();
		$name=$row['name'];
	}
	else
	{
		header('location:./index.php');
	}
	
	$lovername = htmlspecialchars(stripcslashes(trim($_POST['lovername'])));
	$dob=htmlspecialchars($_POST['dob']);
	if(isset($lovername) and isset($dob) and $lovername!="" and $dob!="")
	{
		$row=explode('-',$dob);
		$n1=0;
		$n2=0;
		$n3=0;
		$num=0;
		
		$n1=str_split($row[0])[0]+str_split($row[0])[1]+str_split($row[0])[2]+str_split($row[0])[3];
		$n2=str_split($row[1])[0]+str_split($row[1])[1];
		$n3=str_split($row[2])[0]+str_split($row[2])[1];
		$num=$n1+$n2+$n3;

		while(strlen($n2)!=1)
		{
			$a=str_split($n2);
			$n2=0;
			$n2=$n2+$a[0]+$a[1];
		}
		//$baseno is moolank
		$baseno=$n2;
		
		while(strlen($num)!=1)
		{
			$anum=str_split($num);
			$num=0;
			foreach($anum as $dt)
			{
				$num=$num+$dt;
			}
		}
		
		//$destinyno is bhagyank
		$destinyno=$num;
		
		//echo 'base='.$baseno.' dest='.$destinyno;
		
		if($baseno==1)
		{
			$msg="You will need to decrease your arrogance to get success. If the number is positive, then such a child will be able to be friends with people from any number. If it's negative, then they won't be able to be friends with any one. Parenting tip: children whose number 1 is positive will like to argue - so talk to such children instead of shouting at them to be quiet or to just listen/obey you. However, if the child also gets angry while being argumentative, then he needs to be disciplined so he doesn't stray in the future.";
			$features="You anger easily, are stubborn, egoistic. You are in management or in the administrative field. You don't understand anyone trying to shut you up You like to give reasons/logic to support what you're saying.";
		}
		else if($baseno==2)
		{
			$msg="Stands for emotions, art, introvert nature - They should keep friends who are slightly emotional and artistic. The negative trait of such people is that they are too emotional, which makes your judgement weak. People with base number 2 need to have people around them who can help them take decisions. Their strongest point is their speech, they can win over anyone by talking to them.";
			$features="Cam, understanding, but very emotional. Give too much importance to relationships and are then troubled due to relationships Don't like to work or study.";
		}
		else if($baseno==3)
		{
			$msg="If the person is on the right path, then the person is ambitious, knowledgeable, strong-headed, and of positive thoughts. They will want to do what they think of. If the no. is giving them positive results, then they will surely attain the level of a Guru in their lifetime. This can be at 25 or at 50, but it will happen for sure. However, if the no. 3 is giving negative results, then the person is too ambitious and is egoistic, which causes problems as it is caused by a special dosh called swaran-dosh . You will not be able to rest as you will keep thinking of your dreams and ambitions even while sleeping. This is especially true for people who were born on the 12th, 3rd or the 30th. So if the person is not egoistic, they can reach great heights. If the ego develops in number 3, then there comes a day when all the money and respect turns into nothing.";
			$features="Wise, understanding, ambitious. If they aren't egoistic, then they can become good leaders or teachers. They can be friends only with knowledgeable people. They can't stand stupid people or will scare them away, or the friendship won't last long. They like to hear nice things about themselves, but claim otherwise They will ask you to stop praising them, but only superficially.";
		}
		else if($baseno==4)
		{
			$msg="These people have in-depth knowledge of their subject of interest. They like to be good at their studies and also look for ways to help the society - this is why they can be good researchers, professors, and scientists. If they can have the guidance of a good guru, they can achieve a lot. They are spiritual, but are always stuck in between materialism and spiritualism. Sometimes they talk of buying all kinds of things while at other times, they want to devote their life to God. They are very emotional and positive. ";
			$features="Happy-go-lucky and spiritual. They don't worry about others. They will take risks just for the sake of it, even if they may not want to. They're too emotional, which causes problems. A guru can change their life for the better. They must always have an ambition/dream otherwise they will go in to depression.";
		}
		else if($baseno==5)
		{
			$msg="These people have a very sharp-edged way of thinking. They understand the deep meaning of things and that too very quickly. If they are trying to take shortcuts, then it can be understood that the no. 5 is not vibrating well with them. This means they will undergo some major problem in their 5th or 6th year of their life. So, if they are taking short-cuts in doing things, are criticizing others, and don't want to go on the straight path in tlife, then it means that they will be deceived in a major way at least 5 to 6 times in their lifetime. If the number is positive, then the person will have many friends. If the number is negative, then either the person will not have any long term friends - either others will deceive him or he will deceive others resulting in only temporary friendship.";
			$features="Clever and very probing. They'll find out about the deepest of secrets They lose patience very quickly which causes problems.";
		}
		else if($baseno==6)
		{
			$msg=" Such people are very artistic, logical, and emotional. They have a balanced nature which brings them success (especially for people who were born on the 6th or the 15th). Their emotions can sometimes lead them into problems.";
			$features="Joyful, artistic, and are interested in the opposite sex. They love their own talents They can influence others with their talents and have others admire them (their talents) too They definitely succeed in life and are always busy trying to be successful";
		}
		else if($baseno==7)
		{
			$msg="Such people are emotional and intelligent. They don't get success on their own. They need a good guru, friends, and good parental guidance to succeed in life. Such people are very creative. If such people get a good Guru, then they can reach great heights with the help of a good guru. This is especially true for people who were born on the 16th, otherwise, their talent is wasted. If the number is not positive, then it causes them to be lazy and afraid of doing things. If they are not lazy, they can become very intelligent and do anything with a bit of effort. Start wearing 4 faced rudraaksh, drink more water, make your willpower strong and do things to build your enthusiasm. This number lacks the enthusiasm that is necessary to succeed so they need to work on increasing it.";
			$features="Depressive, but wise people so they find their way.l A guru can greatly help them. Success comes in short breaks - not in one go, but it does come. Their own efforts will result in success.";
		}
		else if($baseno==8)
		{
			$msg="Such people are very practial and hard-working. If the number is positive, then they do their work with a lot of honesty and get great success. However, if the numer is negative, then they will look for shortcuts and will want to succeed in a short span of time, the success comes but then they fall flat on their face after which they are unable to succeed in life. So this number needs to be very honest. ";
			$features="Hard-working, social, business-minded Turn out to be good partners Don't like to be in jobs - they prefer their own business";
		}
		else if($baseno==9)
		{
			$msg="Very energetic, very knowledgeable, and very willing to help others. They involve themselves in any work they do. They keep doing something for a long period of time and try to achieve perfection in that. Females don't get much love from males and males don't get much love from females. They are very talented and learn any new thing very quickly. They are good friends and like to maintain relationships. If the number is positive, then they are good administrators. If the number is negative, then they will become dictators, will criticize others, will try to avoid doing their work, they may resort to sycophancy. Also, if the number is negative and they get angry, then they can even commit a crime due to their anger. So, these people/children need to learn to remain calm.";
			$features="Very energetic and wise Personal relations are weak They're good at their work. They're good at administration. They can achieve good positions, but success takes time.";
		}
		$sugg1="Invite her to your place for a special movie night, complete with popcorn and hot cocoa";
		$sugg2="Leaving a sweet little note at times may work wonders. Imagine when you wake up to little notes of care and surprise, it makes your day, doesn't it?";
		$sugg3="If you’ve got a crush, some cute candy might be just the thing to turn your best pal into your gal!";
		$sugg4="We recommend Sweethearts - each little heart comes with its own special Valentine's message, like Be Mine and Text Me!";
		$sugg5="A card is the perfect way to say you remembered this special day without going overboard or spending too much (remember, you want to save some tricks for their birthday and Christmas as well!) If you want to make it extra-special, make the card yourself. A homemade card will be the way to her heart.";
		$sugg6="If you love your lady, chances are you love her taste in tunes as well, so treat her to a magical day with some new music!
		We recommend Adele's new album '25', or 'Purpose' by Justin Bieber.";
		$sugg7="Every girl likes to know she’s beautiful, but don’t forget to appreciate her brain as well! If you get your babe a book, she’ll know you love her for more than her looks. We recommend The 5th Wave trilogy by Rick Yancey, a great sci-fi series featuring an strong and independent lead character every girl can relate to. The Last Star will be release on May 24th, 2016.";
		$sugg8="If you want to give your love a gift that says “chic & luxury”, perfume is the perfect pick. We recommend Miss Dior Cherie By Christian Dior, a timeless and elegant choice.";
		$sugg9="A piece of jewelry can show your cutie that she's a keeper. She'll cherish a charm bracelet or heart-shaped pendant necklace.";
		$sugg10="When your girlfriend goes to sleep at night she’ll dream of you when she gets a Valentine’s teddy bear. Just find the one you think is the cutest!";
		$sugg11="Chocolates are a tried, tested and true way to show your girl she’s special, and if you’re good she might just let you have one!";
		$sugg12="Roses are a time-honored Valentine’s tradition. Whether you get the full dozen or just a single stem, roses say “I Love You” like no other flower. Be warned though, lots of places sell out on Valentine’s Day, so make sure you don’t leave it to the last minute!";
		$adv1="Transparency: Honesty is still the best policy. Never lie to her if you are thinking of a long-term relationship. Never mind you will face some initial flak, but eventually you will win over her trust.";
		$adv2="Superman: Women love to be protected. So show in more ways than one to prove that you will be her saviour should your damsel land in distress! Women are always in awe of men who can step up in times of conflicts. Be sure you grab every opportunity that situation throws at you.";
		$adv3="Smell good: Deodorant Ads may be going overboard showing men being lured by women's perfume. But the other way is also true. Choose a deo that suits you. Especially if it's your first date, it's best not to try anything experimental. Know what smells best on you. Remember, what smelt heavenly on your friend might stink on your skin! For everything depends on your body odour. When you spray perfume on your body, what you smell is a combination of the deo spray and your body odour. Choose wise.";
		$adv4="Surprises galore: Women love surprises be it chocolates, love notes, gifts or even a bouquet of flowers. Women don't mind them in any numbers. You are sure to score brownie points with this one!";
		$adv5="Perfect body: What with the celebrities being obsessed with getting a six pack or eight pack abs, girls too go ga ga over men with a well-toned body. Get into the habit of regular workout so you can make heads turn!";
		$adv6="Dress well: Nothing turns off a women than a poorly-dressed man. Do a style-check, spot the trends in fashion, speak to a stylist to find out what looks best on you. Clothes maketh man literally!";
		$adv7="Crowning glory: Nothing like a funky haircut! A good hairstyle can give you a different look altogether. What are you waiting for? Get that stunner look so you can impress that chick you have been eyeing.";
		$adv8="Magic :You might have taken your girlfriend to the hottest restaurants in town, yet she will not mind if you can cook one of her favourite dishes (or even plain instant noodles) when she's hungry. Such moments are never forgotten.";
		echo '<div class="col-lg-4">
				<div class="box" style="color:#ee074d;">
					<b>About you</b></br>
					'.$msg.'
				</div>
			 </div>';
			 
			 $per=rand(80,99);
			 $su=rand(1,12);
			 $ad=rand(1,8);
			 
		echo '<div class="col-lg-4">
				<div class="box" style="color:#007f00;">
				<b>Hi '.$name.', your love percentage with '.$lovername.' :</b></br></br>
				<div class="progress">
					<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="'.$per.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$per.'%">
						'.$per.'%
					</div>
				</div>
					'.${'sugg'.$su}.'
				</br></br>
					'.${'adv'.$ad}.'
				</div>
			 </div>';
			 
		echo '<div class="col-lg-4">
				<div class="box" style="color:#058cdf;">
					<b>Your destiny number :'.$destinyno.'<br>Your base number :'.$baseno.'</b></br>
					'.$features.'
				</div>
			 </div>';
	}
	else
	{
		echo 'Try again....';
	}
?>
