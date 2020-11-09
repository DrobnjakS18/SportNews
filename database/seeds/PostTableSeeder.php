<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'Soccer\'s Misery Index features Man United, Rangers, Malaga and other painful tales',
                'slug' => 'soccers-misery-index-features-man-united-rangers-malaga-and-other-painful-tales',
                'content' => '<p>Sports are cruel. There, we said it. They play with our emotions, mess with our hearts, fill us with joy and smash it just as quickly. Every team has known what it\'s like to lose a big game, but how about a full season of losing? How about a decade? How about a lifetime?</p>

<p>There are unhappy fan bases all over soccer, but if your definition of pain is not winning every trophy, or getting knocked out of the Champions League in the quarterfinals, think again. You\'ve not heard anything yet.</p>

<p>The ESPN FC Misery Index is a chance to shine a light on those teams that have endured far more than their fair share of sadness in the modern era, to let those fans tell their stories and explain why it has been so tough to be a fan.<img src="http://sport.test/storage/images/i_(1)_1581585198.jpg" alt="i_(1)_1581585198.jpg"></p>

<p><br></p>

<p>"There are things that only happen to Botafogo."</p>

<p>It is a common phrase in Rio de Janeiro football, usually uttered by fans of the club. The depth of self-pity is revealing and, in a sense, understandable.</p>

<p>When older Botafogo fans speak of their club\'s golden age, it is not rose-tinted nostalgia. They really did grow up watching the legends. The Brazil teams that won the World Cup in 1958, \'62 and \'70, thereby establishing the country as football\'s spiritual home, were basically formed by the Santos team that included Pele, and Botafogo, which contributed great winger Garrincha, second in the pantheon of the Brazilian game, and epic left-back Nilton Santos, nicknamed the "encyclopaedia" because he knew it all. Didi and Gerson, the <em>Selecao</em> midfield pass masters, were Botafogo players, as were Mario Zagallo on the wing, Amarildo, who stepped in so well when Pele was injured in \'62, and Jairzinho, who scored in every game in the magical 1970 campaign.</p>',
                'short_text' => 'Sports are cruel. There, we said it. They play with our emotions, mess with our hearts, fill us with...',
                'picture' => 'i_1581585212.jpg',
                'user_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'Ronaldo and Zlatan clash for the first time since 2015. Are you ready?',
                'slug' => 'ronaldo-and-zlatan-clash-for-the-first-time-since-2015-are-you-ready',
                'content' => '<p>On Thursday, two of the most prolific goal scorers of their generation will meet for the ninth time in their respective careers. AC Milan host Juventus in the first leg of the Coppa Italia semifinals -- <strong>stream live on ESPN+, 2:45 p.m. ET Thursday</strong> -- and that means 38-year-old recent Milan signing (well, re-signing) <a href="http://espnfc.com/player/_/id/11001/Zlatan-Ibrahimovic">Zlatan Ibrahimovic</a> and 35-year-old second-year Juve striker <a href="http://espnfc.com/player/_/id/22774/Cristiano-Ronaldo">Cristiano Ronaldo</a> will face off for the first time since November 2015.</p>

<p>Ronaldo and Ibrahimovic have played each other eight times at the club level: six times in the Champions League and twice in La Liga, when Zlatan was with Barcelona. These matches resulted in three draws, three wins for Ronaldo, two wins for Ibrahimovic and just three combined goals for the two strikers. This matchup itself is not without short-term consequence. Winning the Coppa Italia might represent Milan\'s best chance to qualify for European competition next year, and the whole point of Juve signing Ronaldo was to win countless trophies. Still, Thursday\'s battle is more interesting for the big-picture perspective than anything else.</p>

<p>Aside from their goal-scoring capabilities -- the two combined for upward of 800 goals in the 2010s (admittedly, about two-thirds of that total came from Ronaldo) -- these two strikers don\'t have a ton in common. Ronaldo has played for just three clubs in the past 17 years (Manchester United, Real Madrid and, for the past season and a half, Juventus), and Ibrahimovic has primarily been a hired gun, playing for more than three seasons with one club just once (Paris Saint-Germain, 2012-16). Ronaldo has won both the Champions League and the Ballon d\'Or five times each; Ibrahimovic has zero of either.</p>

<p><br></p>

<p>Juventus\' acquisition of Ronaldo was the grandest of gestures, costing more than £100 million and bringing enormous expectations. Milan\'s goals in bringing in Ibrahimovic were far more modest. In the end, there\'s a chance we look at the latter move as more successful than the former.</p>

<p>It\'s all about where you set the bar.</p>

<p><strong>It was clear that, in signing Ronaldo, Juventus were thinking beyond Italy</strong></p>

<p><br></p>

<p><img src="http://sport.test/storage/images/ronaldo_1581588296.jpg" alt="ronaldo_1581588296.jpg"></p>',
                'short_text' => 'On Thursday, two of the most prolific goal scorers of their generation will meet for the ninth ti...',
                'picture' => 'ronaldo_ibra_1581588318.jpg',
                'user_id' => 2,
                'category_id' => 1
            ],
            [
                'title' => 'Ajax defender Daley Blind makes first appearance since heart procedure',
                'slug' => 'ajax-defender-daley-blind-makes-first-appearance-since-heart-procedure',
                'content' => '<p>"I am really happy to be back on the pitch," Blind told Fox Sports Netherlands. "I was so eager to get back. I had a little bit of tension beforehand because you don\'t know how it will go. But I knew before the match that I would come on, so I looked forward to it."</p>

<p>The procedure Blind underwent in December saw the former Manchester United defender fitted with a subcutaneous implantable defibrillator, according to the club.</p>

<p>Blind said: "It was heavy period because you don\'t know what is coming or which news you will get but luckily it didn\'t last long for everything to look good. I have been positive most of the time and was busy with my return.</p>

<p>"The doctor really needed to hold me back and step on the brakes because I wanted to get back asap. I wasn\'t scared at all, I wanted to get back on the pitch as fast as possible.</p>

<p>"I have missed [playing] a lot. I missed my teammates and I missed being on the pitch. I need to build up now, I am not fully fit to play 90 minutes."</p>

<p>Ajax, who missed out on the Champions League round of 16 after making it to the semifinals in 2019, next face RKC Waalwijk in the Eredivisie on Feb. 16.</p>',
                'short_text' => '"I am really happy to be back on the pitch," Blind told Fox Sports Netherlands. "I was so eager t...',
                'picture' => 'ajax_1581588851.jpg',
                'user_id' => 3,
                'category_id' => 1
            ],
            [
                'title' => 'ESPN FC 100: Liverpool, Man City dominate our ranking of world\'s best soccer players',
                'slug' => 'espn-fc-100-liverpool-man-city-dominate-our-ranking-of-worlds-best-soccer-players',
                'content' => '

<p>To compile the 2019 edition of ESPN FC 100, more than 40 ESPN FC experts from around the world were given a list of about 250 players and managers to make their selections.</p>

<p>Now here\'s the key: We didn\'t use one mega-list with all players mixed together -- such conceits inevitably favor attackers because everyone loves a good goal, don\'t they? But that isn\'t fair to those engaged in the dark arts at the back. So instead, we broke down the world\'s best players by position in a 4-3-3 formation, plus manager. Each expert then contributed a top 10 for each category: we crunched the numbers and did a final review with a select few writers.</p>

<p>Also new for this year: we presented the No. 1 players at each position with an FC 100 award. You can watch our presentations in the video atop this file. (And you thought emotions ran high for the Ballon d\'Or.)</p>

<p>ESPN FC 100 is back, and our annual ranking of the best men\'s players and managers in the world <em>right now</em> made something abundantly clear: <a href="https://www.espn.com/soccer/club/_/id/364/liverpool">Liverpool</a> rule.</p>

<p>The Merseyside club took home more than a few top honors, followed by <a href="https://www.espn.com/soccer/league/_/name/eng.1">Premier League</a> defending champions <a href="https://www.espn.com/soccer/club/_/id/382/manchester-city">Manchester City</a> and, oh yeah, this Average Joe who plies his trade in <a href="https://www.espn.com/soccer/team/_/id/83/Barcelona">Barcelona</a>. (Three guesses who that is -- and the first two don\'t count.)</p>

<p><br></p>',
                'short_text' => 'To compile the 2019 edition of ESPN FC 100, more than 40 ESPN FC experts from around the world...',
                'picture' => 'world_1581589191.jpg',
                'user_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'At Barcelona it\'s Lionel Messi, Pique and the players who hold the power, not the manager',
                'slug' => 'at-barcelona-its-lionel-messi-pique-and-the-players-who-hold-the-power-not-the-manager',
                'content' => '<p>"Not in my wildest dreams could I have imagined being coach of Barcelona," Quique Setien said after the club appointed him last week, ending a turbulent chapter under the previous boss, Ernesto Valverde. "I never thought Barcelona would choose me."</p>

<p>Nor did most people. Betis\' 61-year-old former coach is a committed follower of Johan Cruyff, father of Barcelona\'s football, but he was jobless with an unremarkable coaching career when the club tapped him to replace the sacked Valverde. Yet it\'s precisely Setien\'s modest coaching career that appeals to Barca, and the same applied to the club\'s first choice, Xavi, who turned them down.</p>

<p>Xavi was a great player whose coaching experience to date amounts to a few months with Al Sadd in Qatar. I realized recently while reporting a book I\'m writing about how Barcelona works: The last thing this club wants is a big-name coach. Almost everywhere in football, the role of the coach is shrinking -- and nowhere more so than at the Camp Nou.</p>

<p><br></p>

<p>The last time Barca chose someone who was an A-list coach at the moment of his appointment was in 2002, when Louis van Gaal briefly returned to the club. After his failure, Barcelona decided to reverse its decision-making. Instead of hiring a coach and letting him decide what kind of football to play, the club would decide what kind of football to play and find a coach to go with it.</p>

<p>What kind of football to play was obvious: the fast-passing, attacking, pressing Dutch style introduced by Cruyff in his years as club coach from 1988 to \'96. In 2003, Barca\'s new president, Joan Laporta, asked Cruyff which coach could bring that football back. Cruyff recommended his fellow Dutchman Frank Rijkaard, freshly relegated from the Dutch Eredivisie with Sparta Rotterdam. Rijkaard came to Barcelona and won the Champions League in 2006.</p>

<p><br></p>

<p>When Rijkaard left in 2008, Barca nearly appointed a big-name coach, as club officials flew to Lisbon to interview Jose Mourinho. Hiring him seemed the obvious choice, but Barca didn\'t. Mourinho\'s defensive game was the opposite of Cruyffian, and his abrasive public persona was the opposite of the "respect" the club wanted to project. Instead, Barca appointed a no-name coach in 37-year-old Josep Guardiola, who, although a former A-list player for the club, at that point had managed only one team, Barca B. Guardiola quickly became the biggest-name coach in football, but after he left in 2012, he was succeeded by a string of "lesser" names. First was Guardiola\'s assistant, Tito Vilanova, and after he resigned, the obscure Argentine Gerardo Daniel \'Tata\' Martino came in, followed by the inexperienced Luis Enrique, Valverde and, finally, Setién.</p>

<p>In short, Barcelona recruits no-name coaches. At this club, the coach isn\'t the boss. He doesn\'t determine how the team plays. Rather, now that the Cruyffian house style is fading out inside Barca, the team\'s style of play is largely determined by the players, in particular by <a href="http://espnfc.com/player/_/id/45843/Lionel-Messi">Lionel Messi</a>.</p>',
                'short_text' => '"Not in my wildest dreams could I have imagined being coach of Barcelona," Quique Setien said aft...',
                'picture' => 'barselona_1581589486.jpg',
                'user_id' => 2,
                'category_id' => 1
            ],
            [
                'title' => 'Luka Doncic, Kristaps Porzingis shine as a duo in Doncic\'s return from injury',
                'slug' => 'luka-doncic-kristaps-porzingis-shine-as-a-duo-in-doncics-return-from-injury',
                'content' => '
<p>It was one of the young Dallas franchise cornerstones\' best performances as a duo, as Doncic and Porzingis showed the kind of synergy they struggled to form early in the season and then saw interrupted by extended injury absences for each.</p>

<p>"It\'s great that we both had those nights," said Doncic, who fed Porzingis on five of his eight assists. "We\'ve got to keep working, and we\'re going to get better and better."</p>

<p>The 20-year-old Doncic, an All-Star starter averaging 28.9 points, 9.5 rebounds and 8.7 assists in his second season, has put up spectacular numbers on a consistent basis when healthy all season. Porzingis, 24, got off to a frustratingly slow start after sitting out the previous season and a half while recovering from a torn ACL in his left knee.</p>

<p>The chemistry between the two was clunky early in the season, while Doncic starred and Porzingis struggled. The Mavs averaged only 101.9 points per 100 possessions with both on the floor in the first 10 games.</p>

<p>All-Star point guard <a href="http://www.espn.com/nba/player/_/id/3945274/luka-doncic">Luka Doncic</a> displayed no signs of rust in his return after missing seven games due to a sprained right ankle. Nor did he disrupt the rhythm <a href="http://www.espn.com/nba/player/_/id/3102531/kristaps-porzingis">Kristaps Porzingis</a> established during Doncic\'s absence.</p>

<p>Doncic had 33 points, 12 rebounds and 8 assists in the <a href="https://www.espn.com/nba/team/_/name/dal/dallas-mavericks">Dallas Mavericks</a>\' <a href="https://www.espn.com/nba/recap?gameId=401161456">130-111 victory</a> over the <a href="https://www.espn.com/nba/team/_/name/sac/sacramento-kings">Sacramento Kings</a> on Wednesday night. Porzingis contributed 27 points, 13 rebounds, 5 assists and 3 blocked shots in the blowout victory during the Mavs\' finale before the <a href="https://www.espn.com/nba/story/_/id/28292088/nba-all-star-game-2020-rosters-schedule-news-how-watch">All-Star break</a>.</p>

<p><br></p>

<p>As Porzingis accepted a secondary role, often spacing the floor as a weakside 3-point threat, the Dallas offense scored at a historic rate. The Mavs averaged 124.0 points per 100 possessions with Doncic and Porzingis on the floor during a monthlong stretch after those first 10 games, and Dallas went 11-3 during that span. (Dallas\' offensive rating of 116.5 this season ranks as the best ever.)</p>

<p>Doncic and Porzingis had played only 160 minutes together over a 30-game span since then entering Wednesday night. Doncic twice sprained his right ankle, causing him to miss a total of 11 games. Between those sprains, Porzingis missed 10 consecutive games due to soreness in his right knee.</p>

<p>If there was a silver lining with Doncic\'s ankle sprains for the Mavs, it was that Porzingis thrived as the focal point of the offense.</p>

<p>"Maybe in a sense where [I could] get my rhythm a bit more. Maybe in that sense," said Porzingis, who averaged 28.8 points per game on 48.8% shooting during Doncic\'s recent absence, compared to 18.4 points on 41.6% shooting overall this season. "But I felt like, yeah, right before he got hurt, we were also getting in a pretty good rhythm, we were playing with each other. Tonight was great."</p>',
                'short_text' => 'It was one of the young Dallas franchise cornerstones\' best performances as a duo, as Doncic and...',
                'picture' => 'doncic_1581589947.jpg',
                'user_id' => 3,
                'category_id' => 2
            ],
            [
                'title' => 'Karl-Anthony Towns out vs. Hornets with injured wrist',
                'slug' => 'karl-anthony-towns-out-vs-hornets-with-injured-wrist',
                'content' => '<p>"He\'s a guy who takes a lot of contact," Saunders said. "He\'s a guy who attacks the rim with force. There\'s been times where he\'s getting knocked to the floor. So we know that there is wear in that sense but no specific action."</p>

<p>Towns is averaging a career-best 26.5 points and 10.8 rebounds in 35 games this season. He missed 15 games earlier this season because of a sprained left knee.</p>

<p><br></p>

<p>The Wolves led for most of the first three quarters Wednesday but blew a double-digit lead to fall in <a href="https://www.espn.com/nba/player/_/id/3136776/dangelo-russell">D\'Angelo Russell</a>\'s home debut. Russell, whom Minnesota acquired last week from the <a href="https://www.espn.com/nba/team/_/name/gs/golden-state-warriors">Golden State Warriors</a>, finished with 26 points and 11 assists.</p>

<p>Wednesday\'s game was the Timberwolves\' last before the break. Their next game is Feb. 21 against Boston.</p>

<p><em>Information from The Associated Press was used in this report.</em></p>
<p><a href="https://www.espn.com/nba/team/_/name/min/minnesota-timberwolves">Minnesota Timberwolves</a> center <a href="http://www.espn.com/nba/player/_/id/3136195/karl-anthony-towns">Karl-Anthony Towns</a> missed Wednesday\'s <a href="https://www.espn.com/nba/game?gameId=401161455">115-108 home loss</a> to the <a href="https://www.espn.com/nba/team/_/name/cha/charlotte-hornets">Charlotte Hornets</a> because of a left wrist injury.</p>

<p>On Tuesday, Towns had an MRI on the wrist, which revealed the injury. He will be further evaluated over the All-Star break, according to the team.</p>

<p>Timberwolves coach Ryan Saunders said before Wednesday\'s game that he did not know when or how Towns was injured. Towns had 23 points, 10 rebounds and 7 assists in 37 minutes in Monday night\'s loss to Toronto.</p>
<p><br></p>',
                'short_text' => '"He\'s a guy who takes a lot of contact," Saunders said. "He\'s a guy who attacks the rim with forc...',
                'picture' => 'towns_1581682412.jpg',
                'user_id' => 1,
                'category_id' => 2
            ],
            [
                'title' => 'NBA All-Star Game 2020: Draft results, news, rosters, schedules and how to watch',
                'slug' => 'nba-all-star-game-2020-draft-results-news-rosters-schedules-and-how-to-watch',
                'content' => '<p>NBA All-Star Weekend is Feb. 14-16 in Chicago, and this is the third consecutive year in which captains participated in a fantasy draft and selected their own teams, compared to the traditional East vs. West format.</p>

<p>All-Star captains <a href="https://www.espn.com/nba/player/_/id/1966/lebron-james">LeBron James</a> and <a href="http://www.espn.com/nba/player/_/id/3032977/giannis-antetokounmpo">Giannis Antetokounmpo</a> have made their draft picks. All-Star Saturday night participants have been unveiled. Rising Stars and Celebrity Game rosters are set.</p>

<p>Keep it here as we count down the days until the league\'s best showcase their skills in Chicago.</p>

<p><strong>Jump to: </strong><a href="https://www.espn.com/nba/story/_/id/28292088/nba-all-star-game-2020-rosters-schedule-news-how-watch#rosters">Draft results</a> | <a href="https://www.espn.com/nba/story/_/id/28292088/nba-all-star-game-2020-rosters-schedule-news-how-watch#bestof">Best of All-Star</a> | <a href="https://www.espn.com/nba/story/_/id/28292088/nba-all-star-game-2020-rosters-schedule-news-how-watch#faq">FAQs</a> | <a href="https://www.espn.com/nba/story/_/id/28292088/nba-all-star-game-2020-rosters-schedule-news-how-watch#watch">How to watch</a> | <a href="https://www.espn.com/nba/story/_/id/28292088/nba-all-star-game-2020-rosters-schedule-news-how-watch#news">Latest news</a></p>

<p><br></p>

<p><strong>Team </strong><a href="https://www.espn.com/nba/player/_/id/1966/lebron-james"><strong>LeBron James</strong></a><strong>*</strong></p>

<p><strong>1. </strong><a href="http://www.espn.com/nba/player/_/id/6583/anthony-davis">Anthony Davis</a>*, Lakers</p>

<p><strong>2. </strong><a href="http://www.espn.com/nba/player/_/id/6450/kawhi-leonard">Kawhi Leonard</a>*, Clippers</p>

<p><strong>3. </strong><a href="http://www.espn.com/nba/player/_/id/3945274/luka-doncic">Luka Doncic</a>*, Mavericks</p>

<p><strong>4. </strong><a href="http://www.espn.com/nba/player/_/id/3992/james-harden">James Harden</a>*, Rockets</p>

<p><strong>5. </strong><a href="http://www.espn.com/nba/player/_/id/6606/damian-lillard">Damian Lillard</a>, Trail Blazers</p>

<p><strong>6. </strong><a href="http://www.espn.com/nba/player/_/id/3907387/ben-simmons">Ben Simmons</a>, 76ers</p>

<p><strong>7. </strong><a href="http://www.espn.com/nba/player/_/id/3112335/nikola-jokic">Nikola Jokic</a>, Nuggets</p>

<p><strong>8. </strong><a href="http://www.espn.com/nba/player/_/id/4065648/jayson-tatum">Jayson Tatum</a>, Celtics</p>

<p><strong>9. </strong><a href="http://www.espn.com/nba/player/_/id/2779/chris-paul">Chris Paul</a>, Thunder</p>

<p><strong>10. </strong><a href="http://www.espn.com/nba/player/_/id/3468/russell-westbrook">Russell Westbrook</a>, Rockets</p>

<p><strong>11. </strong><a href="https://www.espn.com/nba/player/_/id/3155942/domantas-sabonis">Domantas Sabonis</a>, Pacers</p>

<p><strong>Team </strong><a href="http://www.espn.com/nba/player/_/id/3032977/giannis-antetokounmpo"><strong>Giannis Antetokounmpo</strong></a><strong>*</strong></p>

<p><strong>1. </strong><a href="http://www.espn.com/nba/player/_/id/3059318/joel-embiid">Joel Embiid</a>*, 76ers</p>

<p><strong>2. </strong><a href="https://www.espn.com/nba/player/_/id/3149673/pascal-siakam">Pascal Siakam</a>*, Raptors</p>

<p><strong>3. </strong><a href="https://www.espn.com/nba/player/_/id/6479/kemba-walker">Kemba Walker</a>*, Celtics</p>

<p><strong>4. </strong><a href="http://www.espn.com/nba/player/_/id/4277905/trae-young">Trae Young</a>*, Hawks</p>

<p><strong>5. </strong><a href="https://www.espn.com/nba/player/_/id/6609/khris-middleton">Khris Middleton</a>, Bucks</p>

<p><strong>6. </strong><a href="http://www.espn.com/nba/player/_/id/4066261/bam-adebayo">Bam Adebayo</a>, Heat</p>

<p><strong>7. </strong><a href="http://www.espn.com/nba/player/_/id/3032976/rudy-gobert">Rudy Gobert</a>, Jazz</p>

<p><strong>8. </strong><a href="https://www.espn.com/nba/player/_/id/6430/jimmy-butler">Jimmy Butler</a>, Heat</p>

<p><strong>9. </strong><a href="http://www.espn.com/nba/player/_/id/3012/kyle-lowry">Kyle Lowry</a>, Raptors</p>

<p><strong>10. </strong><a href="http://www.espn.com/nba/player/_/id/3913176/brandon-ingram">Brandon Ingram</a>, Pelicans</p>

<p><strong>11. </strong><a href="https://www.espn.com/nba/player/_/id/3908809/donovan-mitchell">Donovan Mitchell</a>, Jazz</p>',
                'short_text' => 'NBA All-Star Weekend is Feb. 14-16 in Chicago, and this is the third consecutive year in which ca...',
                'picture' => 'NBA-All-Star-2020_1581682602.jpg',
                'user_id' => 1,
                'category_id' => 2
            ],
            [
                'title' => 'Sources: Cavaliers and coach John Beilein have discussed possibility of him stepping down',
                'slug' => 'sources-cavaliers-and-coach-john-beilein-have-discussed-possibility-of-him-stepping-down',
                'content' => '<p>Cleveland hired associate head coach J.B. Bickerstaff with the expectation that he would eventually replace Beilein as part of a succession plan, but no one -- not the organization nor Bickerstaff -- imagined it would be inside one of season.</p>

<p>Cleveland is 14-40, the worst record in the Eastern Conference and behind only that of <a href="https://www.espn.com/nba/team/_/name/gs/golden-state-warriors">Golden State</a> (12-43) for the worst in the NBA. Management expected the team to lose a significant number of games as it turned toward rebuilding its roster around a younger core, but Beilein has struggled to connect with NBA players and has had several missteps along the way that have shaken the players\' confidence in his leadership, league sources said.</p>

<p><br></p>

<p>Altman hired Beilein with the hope that his illustrious history as a teacher on the college level would infuse the Cavaliers with a strong program for player development and his storied offensive sets. However, opposing teams realized early that Beilein had scrapped his offense shortly into the season and retreated to more traditional NBA sets.</p>

<p>Beilein has also dealt with some personal and family turmoil, as his son Patrick was dismissed before the start of his first season as head coach at <a href="https://www.espn.com/mens-college-basketball/team/_/id/315/niagara-purple-eagles">Niagara University</a>. Personal issues were cited.</p>',
                'short_text' => 'Cleveland hired associate head coach J.B. Bickerstaff with the expectation that he would eventual...',
                'picture' => 'cleveland_1581945330.jpg',
                'user_id' => 2,
                'category_id' => 2
            ],
            [
                'title' => 'The Elam Ending led to an INTENSE All-Star fourth quarter',
                'slug' => 'the-elam-ending-led-to-an-intense-all-star-fourth-quarter',
                'content' => '<p>New changes to the format of a game constantly wrought with questionable defense and effort would ensure a unique experience, and those changes were made in honor of the late Kobe Bryant.</p>

<p>The new format featured a revamped fourth quarter in which the teams play to a final target score, <a href="https://www.espn.com/nba/story/_/id/23825970/zach-lowe-basketball-tournament-nba-crunch">first introduced in The Basketball Tournament as the Elam Ending</a>. The final target score was determined by taking the leading team\'s total cumulative score through three quarters and adding 24 points -- the 24 representing Bryant\'s jersey number. The first team to reach the final target score during the untimed fourth quarter wins the game.</p>

<p>That number was 157 after Team Giannis led Team LeBron 133-124 at the end of three quarters. Fifty-one minutes of commercial-free chaos ensued in the form of charges, coach\'s challenges, fouls and defense -- and the people ate it all up:</p>',
                'short_text' => 'New changes to the format of a game constantly wrought with questionable defense and effort would...',
                'picture' => 'lebron_1581945606.jpg',
                'user_id' => 3,
                'category_id' => 2
            ],
            [
                'title' => 'Australian Open winner Sofia Kenin comes up big again to lead U.S. to Fed Cup finals',
                'slug' => 'australian-open-winner-sofia-kenin-comes-up-big-again-to-lead-us-to-fed-cup-finalsC',
                'content' => '<p>"It\'s really such a unique experience," Mattek-Sands told reporters at the team\'s post-event news conference.</p>

<p>"I\'m so glad I got to be out there with this little beast over here," Mattek-Sands added, referring to the 5-foot-7 Kenin.</p>

<p><br></p>
<p>Exactly one week after hoisting the women\'s singles trophy at the Australian Open, <a href="http://www.espn.com/sports/tennis/players/profile?playerId=2746">Sofia Kenin</a> again stood in triumph with cheers cascading over her from an appreciative crowd.</p>

<p>This time, Kenin was not alone. On Saturday at a Fed Cup event in Everett, Washington, Kenin celebrated with her doubles partner, <a href="http://www.espn.com/sports/tennis/players/profile?playerId=497">Bethanie Mattek-Sands</a>. They had just stopped Latvia\'s <a href="https://www.espn.com/sports/tennis/players/profile?playerId=2195">Jelena Ostapenko</a> and <a href="https://www.espn.com/sports/tennis/players/profile?playerId=756">Anastasija Sevastova</a> 6-4, 6-0 to give the U.S. a 3-2 victory. It was the decisive third match of a day that started with the Americans ahead two matches to none.</p>

<p>Just feet away, a U.S. bench featuring <a href="http://www.espn.com/sports/tennis/players/profile?playerId=394">Serena Williams</a>, teen sensation <a href="http://www.espn.com/sports/tennis/players/profile?playerId=3626">Coco Gauff</a>, <a href="http://www.espn.com/sports/tennis/players/profile?playerId=1765">Alison Riske</a> and team captain Kathy Rinaldi hugged and high-fived in jubilation.</p>


<p>The win punched the U.S. team\'s ticket to the new-look 12-team Fed Cup by BNP Paribas Finals to be played on April 14-19 in Budapest, Hungary. Like Davis Cup, Fed Cup has experienced a makeover, adopting a World Cup-style arrangement that will feature a round-robin format with four groups of three teams, followed by knockout semifinals and final over the course of one week.</p>

<p>This year, Fed Cup is also a precursor to the Tokyo Olympic Games, which are July 24 to Aug. 9. The competition offers the same daunting mix of opportunity and challenge as any other event in which national honor, not just individual accomplishment, is at stake. That\'s a mission the newest U.S. Grand Slam singles champion has embraced in more ways than one.</p>

<p>Kenin, who turned 21 in November, has appeared in just three previous Fed Cup ties, only one of them a win. She was thrown into the deep end as an 18-year-old in her first appearance, a final in Prague against a veteran Czech team. She lost a pair of three-set heartbreakers in the defeat for the U.S., but that didn\'t dim her enthusiasm.</p>',
                'short_text' => '"It\'s really such a unique experience," Mattek-Sands told reporters at the team\'s post-event news...',
                'picture' => 'tenis_1581592368.jpg',
                'user_id' => 1,
                'category_id' => 3
            ],
            [
                'title' => 'Match in Africa: Highlights from Roger Federer, Rafael Nadal charity event',
                'slug' => 'match-in-africa-highlights-photos-results-and-reaction-from-roger-federer-rafael-nadal-charity-event',
                'content' => '<p>Truth be told, the kids didn\'t seem to know who the two sporting greats were, but the Simon Says activity and the reading session with their "tutors" went down a treat.</p>

<p>One day when they are a little older, they will realize the magnitude of February 7, 2020, when Roger Federer, in full dad mode, sang If You\'re Happy and You Know It and stamped his feet at the base of Table Mountain.</p>

<p>Those who attended the festivities at Cape Town Stadium will without a doubt say the Fedal match was the main course, despite the result (Federer won, 6-4, 3-6, 6-3, incidentally) being irrelevant. The match itself was light-hearted, as you\'d expect from an exhibition event, but also had its fair share of quality shots.</p>

<p>South African comedian and The Daily Show host Trevor Noah and philanthropist Bill Gates played in the doubles (Mr Gates being by far the superior player), while local acts the Ndlovu Youth Choir, of America\'s Got Talent fame, added some African flavor, and the Zip Zap Circus brought the acrobatics.</p>

<p>But it was the main purpose of the event, the charity aspect, that truly won the day. A charity that started 16 years ago, and has already benefitted 1.5 million children in Africa and Switzerland by providing them with better quality education, can now help even more vulnerable kids.</p>

<p>The 51,954 people who turned up, and the sponsors who plastered their names around the place, came to the party big time, and the children in South Africa will be the big beneficiaries as all the net proceeds will go to the Roger Federer Foundation to support education in the rural areas in the country.</p>',
                'short_text' => 'Truth be told, the kids didn\'t seem to know who the two sporting greats were, but the Simon Says...',
                'picture' => 'feder_nadal_1581592577.jpg',
                'user_id' => 2,
                'category_id' => 3
            ],
            [
                'title' => 'Medvedev crashes out in Rotterdam while Evans eases through',
                'slug' => 'medvedev-crashes-out-in-rotterdam-while-evans-eases-through',
                'content' => '<p>World number five Medvedev, long-touted as one of the most likely of the new generation of players to win a Grand Slam, saw his Rotterdam challenge ended in just 68 minutes by Pospisil.</p>

<p>The 29-year-old Canadian, who continues a fine run of form having reached the final at the Open Sud de France in Montpellier last week, managed to save five of six break points while converting three of his own en route to a huge upset.</p>

<p>British number one <a href="https://www.espn.com/tennis/player/_/id/901/daniel-evans">Dan Evans</a> is through to the quarterfinals at the Rotterdam Open after a 4-6 6-3 6-4 victory over Russia\'s <a href="https://www.espn.com/tennis/player/_/id/2367/karen-khachanov">Karen Khachanov</a> on Wednesday.</p>

<p>Evans came back from a set down and will face either France\'s <a href="https://www.espn.com/tennis/player/_/id/242/gael-monfils">Gael Monfils</a> or <a href="https://www.espn.com/tennis/player/_/id/302/gilles-simon">Giles Simon</a> in the next round.</p>

<p>Top seed <a href="https://www.espn.com/tennis/player/_/id/2383/daniil-medvedev">Daniil Medvedev</a> crashed out of the last 16, losing to 104th-ranked Canadian <a href="https://www.espn.com/tennis/player/_/id/1352/vasek-pospisil">Vasek Pospisil</a>, who marched in with a 6-4 6-3 victory.</p>


<p><a href="https://www.espn.com/tennis/player/_/id/242/gael-monfils">Monfils</a> started his Rotterdam Open title defence with a convincing 6-3 6-2 victory over Portugal\'s <a href="https://www.espn.com/tennis/player/_/id/2109/joao-sousa">Joao Sousa</a>.</p>

<p>Monfils who beat Pospisil in the final to win in Montpellier last week, needed only 70 minutes to dispatch his Portuguese opponent, firing five aces and converting four break points.</p>

<p>The 33-year-old Frenchman, who is looking to become the first player to win back-to-back Rotterdam titles since Sweden\'s <a href="https://www.espn.com/tennis/player/_/id/217/robin-soderling">Robin Soderling</a> in 2011, next faces compatriot <a href="https://www.espn.com/tennis/player/_/id/302/gilles-simon">Gilles Simon</a> who beat <a href="https://www.espn.com/tennis/player/_/id/1141/mikhail-kukushkin">Mikhail Kukushkin</a> 7-6(3) 3-6 6-3.</p>

<p>"It\'s never easy to come back after a win," Monfils said. "But I have great memories from last year."</p>

<p>In an all-Spanish showdown, <a href="https://www.espn.com/tennis/player/_/id/1590/pablo-carreno-busta">Pablo Carreno Busta</a> beat sixth seed <a href="https://www.espn.com/tennis/player/_/id/1733/roberto-bautista-agut">Roberto Bautista Agut</a> 6-4 2-6 7-6(4) to qualify for the quarter-finals after a battle lasting nearly two-and-a-half hours.</p>

<p>Carreno Busta fired 11 aces and saved seven break points to advance at his higher-ranked compatriot\'s expense.</p>

<p>Belgian fourth seed<a href="https://www.espn.com/sports/tennis/players/profile?playerId=1360"> David Goffin</a> battled back from a set down and saved two break points in the decider to beat local hope <a href="https://www.espn.com/sports/tennis/players/profile?playerId=650">Robin Haase</a> 3-6 7-6(5) 6-4.</p>

<p>Goffin will face Italian Jannik Sinner, who was awarded a walkover after his opponent <a href="https://www.espn.com/sports/tennis/players/profile?playerId=884">Radu Albot</a> withdrew.</p>',
                'short_text' => 'World number five Medvedev, long-touted as one of the most likely of the new generation of player...',
                'picture' => 'medvedev_1581592762.jpg',
                'user_id' => 2,
                'category_id' => 3
            ],
            [
                'title' => 'Donation, donation, donation',
                'slug' => 'donation-donation-donation',
                'content' => '<p>With bushfires ravaging Australia, a tennis tournament was the last thing on everyone\'s mind. However, that didn\'t mean the tennis community wouldn\'t unite and raise much-needed funds for those in need.</p>

<p>Before the Australian Open even began, a number of the game\'s top players came together for what was dubbed the Rally for Relief. The tennis exhibition, staged at Rod Laver Arena, raised a staggering AU$4.8 million</p>

<p><br></p>

<p>Australian star <a href="http://www.espn.com/tennis/player/_/id/1984/nick-kyrgios">Nick Kyrgios</a>, who was the catalyst in organizing the Rally for Relief, then pledged an AU$200 donation for every ace he hit across the summer of tennis.</p>

<p>Further creative donations came in thick and fast, in the end over AU$6 million was raised to help with bushfire recovery efforts.</p>',
                'short_text' => 'With bushfires ravaging Australia, a tennis tournament was the last thing on everyone\'s mind. How...',
                'picture' => 'donation_1581945916.jpg',
                'user_id' => 2,
                'category_id' => 3
            ],
            [
                'title' => 'New Nick and awesome Ash',
                'slug' => 'new-nick-and-awesome-ash',
                'content' => '<p>The 42-year drought between homegrown Australian Open singles champions might still remain, but local stars Kyrgios and Barty won millions of admirers Down Under this past fortnight.</p>

<p>As mentioned, Kyrgios, the world No. 26, inspired dozens of other professional players to make donations towards the bushfire appeal, but it was his gritty performances against 16th seed <a href="http://www.espn.com/tennis/player/_/id/2367/karen-khachanov">Karen Khachanov</a> in the third round and Nadal in the fourth round that showed why many have been tipping him to soon breakthrough for a major title.</p>

<p><br></p>

<p>Meanwhile, world No. 1 Barty excited Australians with a glorious run to the semifinals at Melbourne Park -- the first homegrown player to reach the final four at the Australian Open since <a href="http://www.espn.com/tennis/player/_/id/306/lleyton-hewitt">Lleyton Hewitt</a> in 2005.</p>

<p>The 23-year-old and reigning French Open champion fell to eventual champion Kenin in the semis, but what a memorable run it was.</p>',
                'short_text' => 'The 42-year drought between homegrown Australian Open singles champions might still remain, but l...',
                'picture' => 'nick_1581946053.jpg',
                'user_id' => 3,
                'category_id' => 3
            ],
            [
                'title' => 'CSGO: 4 things we learned from Week 2 of BLAST Premier Spring Series',
                'slug' => 'csgo-4-things-we-learned-from-week-2-of-blast-premier-spring-series',
                'content' => '<p>We\'re over halfway through the BLAST Premier Spring Series, and, after an incredibly eventful opening weekend, it was difficult to imagine anything that could top FaZe Clan\'s dominant run in Group A.</p>

<p>But Week 2 of BLAST upped the ante, producing some of the biggest upsets in the tournament\'s history.</p>

<p>Underdogs Complexity stunned world No. 1 Astralis in their opening game before pulling off another shock victory against Team Vitality to reach the Spring Finals.</p>

<p>Na\'Vi did the uneasy job and ended Complexity\'s unlikely crusade with victory in the final game, with both teams joining FaZe and Team Liquid at the finals in June.</p>

<p>With plenty to unpack from Group B, here are some of the things we learned from Week 2.</p>

<p><strong>What\'s going on with Astralis?</strong></p>

<p><br></p>

<p><img src="http://sport.test/storage/images/csgo2_1581593236.jpg" alt="csgo2_1581593236.jpg"></p>

<p><br></p>

<p>Astralis were the heavy favourites going into the entire tournament, never mind this weekend. But the veteran front runners suffered a shock 2-0 defeat to a fresh-faced Complexity roster -- a side widely considered to be the underdogs of Group B.</p>

<p>They picked themselves back up in the losers\' bracket and dominated Na\'Vi on Train but failed to find the edge to secure a win and were subsequently relegated to the Spring Showdown after losing the second and third maps.</p>

<p>Make no mistake, losing in this fashion will be a distant feeling for many in the Astralis roster --the last time the team finished in last place at an event was in the inaugural finals of ECS back in 2016. So, how did a four-time Major winning side fall flat after finishing 2019 on such a high?</p>

<p>Nicolai "dev1ce"Reedtz said there were some communication issues during the match against Complexity that contributed to their loss.</p>

<p>"A lot of things went wrong," dev1ce said. "It was the first game of the year so it\'s hard to pinpoint exactly what went wrong. There\'s a lot of things in game and also communication and preparation so I guess you have to mix that with Complexity playing well and it being an off day.</p>

<p>"Sometimes when we lost the first kill the communication just died, it doesn\'t really happen that often. What happens is we just run into them instead of resetting and talking about what to do next.</p>

<p>"It\'s something we\'ve abused with some of the other teams so it\'s quite stupid that we fell into that trap of not speaking. It\'s been a while since we played our last game on stage so we just have to get back into it."</p>',
                'short_text' => 'We\'re over halfway through the BLAST Premier Spring Series, and, after an incredibly eventful ope...',
                'picture' => 'csgo-new_1581682725.jpg',
                'user_id' => 1,
                'category_id' =>4
            ],
            [
                'title' => 'Sp9rk1e and Hanbin are ready to prove they\'re Overwatch League material',
                'slug' => 'sp9rk1e-and-hanbin-are-ready-to-prove-theyre-overwatch-league-material',
                'content' => '<p>NEW YORK -- The basement of the Hammerstein Ballroom shook. A loud cry echoed from above followed by rolling cheers of "M-V-P, M-V-P!" for Bang "JJoNak" Sung-hyeon. They drowned out a slight young man in a Paris Eternal windbreaker. DPS prodigy Kim "Sp9rk1e" Yeong-han stood next to his Paris Eternal and former Element Mystic teammate Choi "Hanbin" Han-bin and frowned a bit, tossing his head before smiling slightly.</p>

<p>"It feels like I\'m in the dark," Sp9rk1e said as the cheers faded. "May 31 seems so far away."</p>

<p>He and Hanbin laughed in the stairwell with their Paris Eternal brethren who played in both games last weekend and chatted with coach Yoon "RUSH" Hee-won. It will be months before Sp9rk1e can play in the league. He\'ll be able to play in the second Excelsior homestand, but only on Day 2 -- his 18th birthday, May 31st, is that Sunday. Hanbin will likely start in the Eternal\'s next match on Feb. 22, two days after his birthday.</p>

<p><strong>ESPN Daily Newsletter:</strong> <a href="http://www.espn.com/espn/feature/story/_/id/16794438/sign-espn-daily-email-newsletter">Sign up now!</a></p>

<p>"Because I play soon, I\'m trying to work hard and push myself to think that I can be better than other players," Hanbin said.</p>

<p>Sp9rk1e has been playing Overwatch at a semi-professional level on Element Mystic in South Korea since 2017, but doesn\'t turn age-eligible for the Overwatch League until this May. Until then, he\'ll be on the sideline, cheering on his Paris Eternal teammates while getting in as much practice time as possible. His rookie debut is one of Overwatch League\'s most highly anticipated this season. Hanbin has been playing since early 2018 in both China and South Korea. Both players have been playing for years, but have had to wait on their Overwatch League debuts due to their ages.</p>

<p>There was a time when OGN\'s APEX tournament in South Korea was the premier Overwatch event in the world. It hasn\'t existed since 2017, when Sp9rk1e was just beginning his semi-professional career. Element Mystic came up through the offline qualifier during APEX Season 4 and performed well in APEX Challengers Season 5 before OGN\'s tournament was shuttered, becoming Contenders: Korea. Sp9rk1e\'s initial Element Mystic team was a star-studded lineup that included Lee "Happy" Jung-woo (Guangzhou Charge), Lee "Guard" Hee-dong (London Spitfire, now retired), Lee "Fearless" Eui-seok (Shanghai Dragons), Kim "Rapel" Joon-keun (Vancouver Titans, Houston Outlaws), Lee "Jecse" Seung-soo (Seoul Dynasty, Houston Outlaws), and Seo "DACO" Dong-hyeong (Atlanta Reign), all of whom made it to the league well before Sp9rk1e was eligible. Now he plays a different waiting game than his time in Contenders Korea, counting down the days until he can play on the Overwatch League stage.</p>',
                'short_text' => 'NEW YORK -- The basement of the Hammerstein Ballroom shook. A loud cry echoed from above followed...',
                'picture' => 'overwatch_1581593171.jpg',
                'user_id' => 2,
                'category_id' => 4
            ],
            [
                'title' => 'Call of Duty Power Rankings: Crowning the best players after London homestand',
                'slug' => 'call-of-duty-power-rankings-crowning-the-best-players-after-london-homestand',
                'content' => '<p>The Chicago Huntsmen took the crown this past weekend as the champions of the Call of Duty League\'s tournament in London. With the Atlanta FaZe idle, it was a chance for the Huntsmen to assert themselves as potentially the best team in the league.</p>

<p>For this week\'s Call of Duty Power Rankings, our staff decided it would be fitting to crown a king for each team following the London Royal Ravens\' home series. On some teams, it is easy to pick out standouts, while on others, it\'s a bit harder; but every team has at least one player who has carried them on certain maps or entire games.</p>

<p><strong>Read more: </strong><a href="https://www.espn.com/esports/story/_/id/28673904/trash-talk-big-crowds-beer-tower-look-back-cdl-london">Trash talk, big crowds and a beer tower in London</a> | <a href="https://www.espn.com/esports/story/_/id/28666995/every-cod-map-royal-ravens-london-homestand-one-sentence">Every COD map from London in one sentence</a></p>

<p>Here\'s how our staff voted to rank the 12 teams after London. Each participating staff member ranked the CDL teams from No. 1 to No. 12, and the results were aggregated to determine the list below. All player stats are courtesy of Atlanta FaZe stat analyst Austin O\'Neil.</p>',
                'short_text' => 'The Chicago Huntsmen took the crown this past weekend as the champions of the Call of Duty League...',
                'picture' => 'cod_1581593541.jpg',
                'user_id' => 3,
                'category_id' => 4
            ],
            [
                'title' => 'From Europe to America, G2 Esports\' brash frontman Ocelote is building an empire',
                'slug' => 'from-europe-to-america-g2-esports-brash-frontman-ocelote-is-building-an-empire',
                'content' => '<p>NEW YORK -- As Carlos Rodríguez Santiago walks down the busy streets of Manhattan, he takes in an empire that he hopes will soon be his.</p>

<p>The center of the business world, but far from it in gaming, New York provides a new opportunity for the 29-year-old CEO, who in the past six years has built Europe\'s most popular esports franchise.</p>

<p>Throughout the years, Santiago has taken over Spain, then Germany, then the entire continent, building championship-winning franchises -- most notably in League of Legends, the game that he once played professionally. Mostly forgotten as a pro, Santiago\'s profile as a front-facing, comedic yet competitive executive of G2 Esports has increased his stardom significantly compared to his glory days using a keyboard and mouse.</p>

<p><br></p>

<p>Santiago now holds the keys to a $165 million business, one he founded after a train of thought that occurred to him randomly while in the back of a cab more than a half decade ago. In November, G2 nearly completed the League of Legends grand slam -- winning two domestic titles, a Mid-Season Invitational title and a League of Legends World Championship -- but finished as the runner-up to FunPlus Phoenix at worlds in front of thousands of their fans in Paris. Santiago is now looking forward from that heartbreaking moment, focusing on the positives and the things within his control presently.</p>

<p>For now, that\'s New York.</p>',
                'short_text' => 'NEW YORK -- As Carlos Rodríguez Santiago walks down the busy streets of Manhattan, he takes in a...',
                'picture' => 'ocelote_1581946218.jpg',
                'user_id' => 4,
                'category_id' => 4
            ],
            [
                'title' => 'How the meta shook out in Overwatch League Week 1',
                'slug' => 'how-the-meta-shook-out-in-overwatch-league-week-1',
                'content' => '<p><span style="color:rgb(72,73,74);">The third season of the Overwatch League kicked off this past weekend. Amid rumors of where and when the Chinese homestands would be rescheduled and a more general unease around hero pools in competitive play, the weekend also gave the community actual games to analyze. With hero pools on the horizon, here is a look at general hero usage during Stage 4 and playoffs of last year compared with hero usage in the first week, and a few slightly-too-early predictions about which heroes will be off the table for teams first come Week 4.</span></p>

<p><br></p>

<p>Looking at last year, Orisa was the dominant hero picked in the <a href="https://public.tableau.com/shared/B6K453NWM?:display_count=y&amp;:origin=viz_share_link&amp;:embed=y">majority of compositions</a>, followed by Mei, Lúcio, Ana, and D.Va. After that, compositions diverged regarding flex supports in Moira and Baptiste, flex tanks in Roadhog and Sigma, and a variety of DPS heroes including Reaper and Hanzo. These statistics back up the idea that tanks and supports are far more static than DPS heroes, where the usage rate drops significantly after Mei, by nearly 20 percent.</p>

<p>This year, Mei is once again <a href="https://public.tableau.com/shared/RJQ3D6NDZ?:display_count=y&amp;:origin=viz_share_link&amp;:embed=y">toward the top of the list</a> with an 83.3 percent usage rate. The only heroes above her are Reinhardt (88.94 percent) and Lúcio (a whopping 91.83 percent). If hero pools were to begin next week, the heroes most likely to be at risk of a ban would be Reinhardt, Lúcio, Mei, and McCree (41.94 percent usage rate), eliminating the popular Mei/McCree combo of obnoxious slows that allow McCree to shoot freely at his opponents.</p>',
                'short_text' => 'The third season of the Overwatch League kicked off this past...',
                'picture' => 'overwatch_1581946566.jpg',
                'user_id' => 4,
                'category_id' => 4
            ]
        ]);
    }
}
