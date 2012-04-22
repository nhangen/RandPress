<?php
/**
 * @package RandPress
 * @version 1.0
 */
/*
Plugin Name: RandPress
Plugin URI: http://wordpress.org/extend/plugins/rand-press/
Description: When activated you will randomly see an Ayn Rand quote in the upper right of your admin screen on every page. Thanks to Matt Mullenweg's Hello Dolly plugin for the inspiration.
Author: Nathan Hangen
Version: 1.0
Author URI: http://virtuousgiant.com
*/

function get_ayn_rand_quotes() {
	//Single varialbe with list of quotes on new lines. We will use explode to separate them.
	$randquotes = "A building has integrity just like a man. And just as seldom.
	Happiness is that state of consciousness which proceeds from the achievement of one's values.
	I swear, by my life and my love of it, that I will never live for the sake of another man, nor ask another man to live for mine.
	Money demands that you sell, not your weakness to men's stupidity, but your talent to their reason.
	Ask yourself whether the dream of heaven and greatness should be waiting for us in our graves – or whether it should be ours here and now and on this earth.
	The question isn't who's going to let me; it's who's going to stop me.
	A creative man is motivated by the desire to achieve, not by the desire to beat others.
	A desire presupposes the possibility of action to achieve it; action presupposes a goal which is worth achieving.
	Achievement of your happiness is the only moral purpose of your life, and that happiness, not pain or mindless self-indulgence, is the proof of your moral integrity, since it is the proof and the result of your loyalty to the achievement of your values.
	Achieving life is not the equivalent of avoiding death.
	Ask yourself whether the dream of heaven and greatness should be waiting for us in our graves - or whether it should be ours here and now and on this earth.
	Civilization is the progress toward a society of privacy. The savage's whole existence is public, ruled by the laws of his tribe. Civilization is the process of setting man free from men.
	Contradictions do not exist. Whenever you think you are facing a contradiction, check your premises. You will find that one of them is wrong.
	Evil requires the sanction of the victim.
	Government 'help' to business is just as disastrous as government persecution... the only way a government can be of service to national prosperity is by keeping its hands off.
	Force and mind are opposites; morality ends where a gun begins.
	Happiness is that state of consciousness which proceeds from the achievement of one's values.
	I don't build in order to have clients. I have clients in order to build.
	It only stands to reason that where there's sacrifice, there's someone collecting the sacrificial offerings. Where there's service, there is someone being served. The man who speaks to you of sacrifice is speaking of slaves and masters, and intends to be the master.
	Love is the expression of one's values, the greatest reward you can earn for the moral qualities you have achieved in your character and person, the emotional price paid by one man for the joy he receives from the virtues of another.
	Money demands that you sell, not your weakness to men's stupidity, but your talent to their reason.
	Money is only a tool. It will take you wherever you wish, but it will not replace you as the driver.
	Money is the barometer of a society's virtue.
	People create their own questions because they are afraid to look straight. All you have to do is look straight and see the road, and when you see it, don't sit looking at it - walk.
	Potentially, a government is the most dangerous threat to man's rights: it holds a legal monopoly on the use of physical force against legally disarmed victims.
	Run for your life from any man who tells you that money is evil. That sentence is the leper's bell of an approaching looter.
	So you think that money is the root of all evil. Have you ever asked what is the root of all money?
	The hardest thing to explain is the glaringly evident which everybody had decided not to see.
	The purpose of morality is to teach you, not to suffer and die, but to enjoy yourself and live.
	The truth is not for all men, but only for those who seek it.
	The worst guilt is to accept an unearned guilt.
	There is a level of cowardice lower than that of the conformist: the fashionable non-conformist.
	There are two sides to every issue: one side is right and the other is wrong, but the middle is always evil.
	The smallest minority on earth is the individual. Those who deny individual rights cannot claim to be defenders of minorities.
	Throughout the centuries there were men who took first steps, down new roads, armed with nothing but their own vision.
	We are fast approaching the stage of the ultimate inversion: the stage where the government is free to do anything it pleases, while the citizens may act only by permission; which is the stage of the darkest periods of human history, the stage of rule by brute force.
	Wealth is the product of man's capacity to think.
	Why do they always teach us that it's easy and evil to do what we want and that we need discipline to restrain ourselves? It's the hardest thing in the world--to do what we want. And it takes the greatest kind of courage. I mean, what we really want.
	Why do they always teach us that it's easy and evil to do what we want and that we need discipline to restrain ourselves? It's the hardest thing in the world--to do what we want. And it takes the greatest kind of courage. I mean, what we really want.";
	
	//Splitting them into lines
	$randquotes = explode( "\n", $randquotes );
	
	//Choose random quotes
	return wptexturize( $randquotes[ mt_rand( 0, count( $randquotes ) -1 ) ] );

}

//Echo the quote
function echo_quote() {
	$quote = get_ayn_rand_quotes();
	echo "<p id='ayn_rand'>&ldquo;$quote&rdquo;</p>";
}

//Run this script whenever admin is loaded via admin_notices
add_action( 'admin_notices', 'echo_quote' );

//Style it up
function randquotes_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';
	
	echo "
	<style type='text/css'>
	#ayn_rand {
		background: #F1F1F1;
		float: $x;
		margin: 0;
		padding: 10px 20px;
		font-size: 12px;
		font-family: 'helvetica neue', helvetica, arial, sans-serif;
	}
	</style>
	";
}

add_action( 'admin_head', 'randquotes_css' );

?>