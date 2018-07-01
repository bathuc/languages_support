<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // delete old record
        DB::table('tenses')->truncate();
        DB::table('tenses_use')->truncate();
        DB::table('tenses_example')->truncate();
        // insert tenses

        // ----------- Present Simple -----------------
        $tenseId = 1;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Present Simple',
            'name_vi' => 'Hiện Tại Đơn',
            'signal_words'=> 'always, every …, never, normally, often, seldom, sometimes, usually, if sentences type I (If I talk, …)',
            'common' => 1,
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action in the present taking place regularly, never or several times'],
            ['tenses_id'=> $tenseId, 'describe' => 'facts'],
            ['tenses_id'=> $tenseId, 'describe' => 'Dramatic narrative (theatre, sports, etc. events)'],
            ['tenses_id'=> $tenseId, 'describe' => 'action set by a timetable or schedule'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He speaks.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He does not speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Does he speak?'],

            ['tenses_id'=> $tenseId, 'describe' => 'I usually go fishing at weekends.'],
            ['tenses_id'=> $tenseId, 'describe' => 'I don’t go fishing at weekends'],
            ['tenses_id'=> $tenseId, 'describe' => 'Do I go fishing at weekends?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You always know the answer.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You don’t always know the answer.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Do you always know the answer?'],

            ['tenses_id'=> $tenseId, 'describe' => 'She never puts milk in her tea.'],
            ['tenses_id'=> $tenseId, 'describe' => 'She doesn’t put milk in her tea.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Does she ever put milk in her tea?'],

            ['tenses_id'=> $tenseId, 'describe' => 'My father plays the violin.'],
            ['tenses_id'=> $tenseId, 'describe' => 'My father doesn’t play the violin.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Does your father play the violin?'],

            ['tenses_id'=> $tenseId, 'describe' => 'We sometimes go to the cinema on Friday.'],
            ['tenses_id'=> $tenseId, 'describe' => 'We don’t go to the cinema on Friday.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Do we go to the cinema on Fridays? '],

            ['tenses_id'=> $tenseId, 'describe' => 'They never walk in the wood.'],
            ['tenses_id'=> $tenseId, 'describe' => 'They don’t walk in the wood.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Do they walk in the wood?'],

            ['tenses_id'=> $tenseId, 'describe' => 'Johnson takes the ball, he bounces it to the floor, then he throws and scores two points.'],

            ['tenses_id'=> $tenseId, 'describe' => 'The train leaves at half past four.'],
            ['tenses_id'=> $tenseId, 'describe' => 'The train doesn’t leave at five.'],
            ['tenses_id'=> $tenseId, 'describe' => 'What time does the train leave?'],

            ['tenses_id'=> $tenseId, 'describe' => 'The course starts on 1 July.'],
            ['tenses_id'=> $tenseId, 'describe' => 'The course doesn’t start in June.'],
            ['tenses_id'=> $tenseId, 'describe' => 'When does the course start?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Present Continuous -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Present Continuous',
            'name_vi' => 'hiện tại tiếp diễn',
            'signal_words'=> 'at the moment, just, just now, Listen!, Look!, now, right now',
            'common' => 1,
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'Action happening now'],
            ['tenses_id'=> $tenseId, 'describe' => 'Action happening about this time, but not necessarily now'],
            ['tenses_id'=> $tenseId, 'describe' => 'action arranged for the future'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He is speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He is not speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Is he speaking?'],

            ['tenses_id'=> $tenseId, 'describe' => 'I’m watching a film on TV now.'],
            ['tenses_id'=> $tenseId, 'describe' => 'I‘m not watching a film'],
            ['tenses_id'=> $tenseId, 'describe' => 'Am I watching a film'],

            ['tenses_id'=> $tenseId, 'describe' => 'Watch out, a car’s coming.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Car isn’t not coming.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Is Car coming?'],

            ['tenses_id'=> $tenseId, 'describe' => 'The boys are sleeping upstairs.'],
            ['tenses_id'=> $tenseId, 'describe' => 'They boys aren’t sleeping upstairs.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Are the boys sleeping upstairs?'],

            ['tenses_id'=> $tenseId, 'describe' => 'He‘s studying Spanish and German.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He‘s studying Spanish and German.'],
            ['tenses_id'=> $tenseId, 'describe' => 'What languages is he studying?'],

            ['tenses_id'=> $tenseId, 'describe' => 'They‘re going to a business course.'],
            ['tenses_id'=> $tenseId, 'describe' => 'They aren’t going to a cooking course.'],
            ['tenses_id'=> $tenseId, 'describe' => 'What course are they going to?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You‘re visiting museums while you’re here.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You‘re not visiting factories.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Are you visiting museums in our city?'],

            ['tenses_id'=> $tenseId, 'describe' => 'I‘m travelling to Paris tomorrow.'],
            ['tenses_id'=> $tenseId, 'describe' => 'I‘m not travelling to Paris tomorrow.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Am I travelling to Paris tomorrow?'],

            ['tenses_id'=> $tenseId, 'describe' => 'My son is taking his girlfriend to dinner tonight.'],
            ['tenses_id'=> $tenseId, 'describe' => 'My son isn’t taking his girlfriend to dinner tonight.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Is he taking his girlfriend to dinner tonight?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You‘re going to Italy on holiday this year, aren’t you?'],
            ['tenses_id'=> $tenseId, 'describe' => 'You aren’t going to Greece.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Where are you going on holiday this year?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Simple Past -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Past Simple',
            'name_vi' => 'quá khứ đơn',
            'signal_words'=> 'yesterday, 2 minutes ago, in 1990, the other day, last Friday, if sentence type II (If I talked, …)',
            'common' => 1,
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'Actions, events in the past'],
            ['tenses_id'=> $tenseId, 'describe' => 'actions taking place one after another'],
            ['tenses_id'=> $tenseId, 'describe' => 'action taking place in the middle of another action'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He spoke.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He did not speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Did he speak?'],

            ['tenses_id'=> $tenseId, 'describe' => 'I had lunch with Mrs Robinson yesterday.'],
            ['tenses_id'=> $tenseId, 'describe' => 'I didn’t have lunch with Mrs Robinson yesterday.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Did I have lunch with Mrs Robinson yesterday?'],

            ['tenses_id'=> $tenseId, 'describe' => 'Mother went to work on Tuesday.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Mother didn’t go to work on Tuesday.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Did Mother go to work on Tuesday?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You did the shopping this morning.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You didn’t do the shopping this morning.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Where did you do the shopping this morning?'],

            ['tenses_id'=> $tenseId, 'describe' => 'She travelled to Spain last year.'],
            ['tenses_id'=> $tenseId, 'describe' => 'She didn’t travel anywhere last year.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Where did she travel last year?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Past Continuous -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Past Continuous',
            'name_vi' => 'quá khứ tiếp diễn',
            'signal_words'=> 'while, as long as',
            'common' => 1,
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action going on at a certain time in the past'],
            ['tenses_id'=> $tenseId, 'describe' => 'actions taking place at the same time'],
            ['tenses_id'=> $tenseId, 'describe' => 'action in the past that is interrupted by another action'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He was speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He was not speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Was he speaking?'],

            ['tenses_id'=> $tenseId, 'describe' => 'We were watching a film at ten last night.'],
            ['tenses_id'=> $tenseId, 'describe' => 'We weren’t watching a film at ten last night.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Were we watching film at ten last night?'],

            ['tenses_id'=> $tenseId, 'describe' => 'I was working in the garden when my sister arrived.'],
            ['tenses_id'=> $tenseId, 'describe' => 'I wasn’t working in the garden when my sister arrived.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Was I working in the garden when my sister arrived?'],

            ['tenses_id'=> $tenseId, 'describe' => 'She was playing with the kids from eight to nine.'],
            ['tenses_id'=> $tenseId, 'describe' => 'She wasn’t playing with the kids from eight to nine.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Who was she playing with?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Present Perfect -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Present Perfect',
            'name_vi' => 'hiện tại hoàn thành',
            'signal_words'=> 'already, ever, just, never, not yet, so far, till now, up to now',
            'common' => 1,
        ];

        $tenseUse =[
//            ['tenses_id'=> $tenseId, 'describe' => 'putting emphasis on the result'],
//            ['tenses_id'=> $tenseId, 'describe' => 'action that is still going on'],
//            ['tenses_id'=> $tenseId, 'describe' => 'action that stopped recently'],
//            ['tenses_id'=> $tenseId, 'describe' => 'finished action that has an influence on the present'],
//            ['tenses_id'=> $tenseId, 'describe' => 'action that has taken place once, never or several times before the moment of speaking'],

            ['tenses_id'=> $tenseId, 'describe' => 'Action with a result'],
            ['tenses_id'=> $tenseId, 'describe' => 'Action in incomplete time'],
            ['tenses_id'=> $tenseId, 'describe' => 'Action in the past without saying when'],
            ['tenses_id'=> $tenseId, 'describe' => 'Action beginning in the past and still continuing'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He has spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He has not spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Has he spoken?'],

            //Action with a result
            ['tenses_id'=> $tenseId, 'describe' => 'Sorry, I‘ve parked at the wrong place.'],
            ['tenses_id'=> $tenseId, 'describe' => 'I haven’t parked at the wrong place.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Have I parked at the wrong place?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You‘ve (already) printed the letters.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You haven’t printed the letters (yet).'],
            ['tenses_id'=> $tenseId, 'describe' => 'Have you printed the letters (yet)?'],

            ['tenses_id'=> $tenseId, 'describe' => 'We‘ve (already) done the rooms.'],
            ['tenses_id'=> $tenseId, 'describe' => 'We haven’t done the rooms yet.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Have we done the rooms (yet)?'],

            ['tenses_id'=> $tenseId, 'describe' => 'He has already repaired the lawn-mower.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He hasn’t repaired the lawn-mower yet. '],
            ['tenses_id'=> $tenseId, 'describe' => 'Has he repaired the lawn-mower yet?'],

            //Action in incomplete time
            ['tenses_id'=> $tenseId, 'describe' => 'Our friends have visited us four times this summer. '],
            ['tenses_id'=> $tenseId, 'describe' => 'Our friends haven’t visited us this summer.'],
            ['tenses_id'=> $tenseId, 'describe' => 'How many times have our friends visited us this summer?'],

            ['tenses_id'=> $tenseId, 'describe' => 'I‘ve been to the cinema a lot lately.'],
            ['tenses_id'=> $tenseId, 'describe' => 'I haven’t been to the cinema lately.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Have I been to the cinema lately?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You‘ve been on holiday this year.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You haven’t been on holiday this year.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Have you been on holiday this year?'],

            //Action in the past without saying when
            ['tenses_id'=> $tenseId, 'describe' => 'Jane has already been to Italy.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Jane has never been to Italy.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Has Jane ever been to Italy?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You have already swum in this lake.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You haven’t swum in this lake yet.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Have you ever swum in this lake?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You‘ve been to the hairdresser’s.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You haven’t been to the hairdresser’s.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Where have you been?'],

            //Action beginning in the past and still continuing:
            ['tenses_id'=> $tenseId, 'describe' => 'The Simpsons have lived here for eight years.'],
            ['tenses_id'=> $tenseId, 'describe' => 'The Simpsons haven’t lived here for long.'],
            ['tenses_id'=> $tenseId, 'describe' => 'How long have the Simpsons lived here?'],

            ['tenses_id'=> $tenseId, 'describe' => 'He has driven a car since 2002.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He hasn’t driven a car since 2002.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Has he driven a car since 2002?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You‘ve worked here for two years. '],
            ['tenses_id'=> $tenseId, 'describe' => 'You haven’t worked here for two years.'],
            ['tenses_id'=> $tenseId, 'describe' => 'How long have you worked here?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Present Perfect Continuous -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Present Perfect Continuous',
            'name_vi' => 'hiện tại hoàn thành tiếp diễn',
            'signal_words'=> 'all day, for 4 years, since 1993, how long?, the whole week',
            'common' => 1,
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'Action beginning in the past and still continuing (with the progress emphasized):'],
            ['tenses_id'=> $tenseId, 'describe' => 'action that recently stopped or is still going on'],
            ['tenses_id'=> $tenseId, 'describe' => 'finished action that influenced the present'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He has been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He has not been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Has he been speaking?'],

            ['tenses_id'=> $tenseId, 'describe' => 'They‘ve been staying in this hotel for ten days.'],
            ['tenses_id'=> $tenseId, 'describe' => 'They haven’t been staying in this hotel for ten days.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Have they been staying in this hotel for ten days?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You‘ve been missing classes lately.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You haven’t been coming to class lately. '],
            ['tenses_id'=> $tenseId, 'describe' => 'What have you been doing lately?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Past Perfect -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Past Perfect',
            'name_vi' => 'quá khứ hoàn thành',
            'signal_words'=> 'already, just, never, not yet, once, until that day, if sentence type III (If I had talked, …)',
            'common' => 1,
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action taking place before a certain time in the past'],
            ['tenses_id'=> $tenseId, 'describe' => 'sometimes interchangeable with past perfect progressive'],
            ['tenses_id'=> $tenseId, 'describe' => 'putting emphasis only on the fact (not the duration)'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He had spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He had not spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Had he spoken?'],

            ['tenses_id'=> $tenseId, 'describe' => 'She said she had written three letters the day before.'],
            ['tenses_id'=> $tenseId, 'describe' => 'She said she hadn’t written any letters the day before.'],
            ['tenses_id'=> $tenseId, 'describe' => 'How many letters had she written the day before?'],

            ['tenses_id'=> $tenseId, 'describe' => 'They had lived in New York before they moved to Liverpool.'],
            ['tenses_id'=> $tenseId, 'describe' => 'They hadn’t lived in New York before they moved to Liverpool.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Where had they lived before they moved to Liverpool?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You‘d locked the door before you left.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You hadn’t locked the door before you left.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Had you locked the door before you left?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Past Perfect Progressive -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Past Perfect Continuous',
            'name_vi' => 'quá khứ hoàn thành tiếp diễn',
            'signal_words'=> 'for, since, the whole day, all day'
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action taking place before a certain time in the past'],
            ['tenses_id'=> $tenseId, 'describe' => 'sometimes interchangeable with past perfect simple'],
            ['tenses_id'=> $tenseId, 'describe' => 'putting emphasis on the duration or course of an action'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He had been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He had not been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Had he been speaking?'],

            ['tenses_id'=> $tenseId, 'describe' => 'He said he had been mowing the lawn all that morning.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He said he hadn’t been mowing the lawn all that morning.'],
            ['tenses_id'=> $tenseId, 'describe' => 'How long had he been moving the lawn when you met him?'],

            ['tenses_id'=> $tenseId, 'describe' => 'They had been working for the same company for a long time before they changed jobs.'],
            ['tenses_id'=> $tenseId, 'describe' => 'They hadn’t been working for the same company for a long time before they changed jobs.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Had they been working for the same company for a long time before they changed jobs?'],

            ['tenses_id'=> $tenseId, 'describe' => 'They had been  living in York before they moved to Liverpool.'],
            ['tenses_id'=> $tenseId, 'describe' => 'They hadn’t been living in York before they moved to Liverpool.'],
            ['tenses_id'=> $tenseId, 'describe' => 'How long had they been living in York before they moved to Liverpool?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Future Simple -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Future Simple',
            'name_vi' => 'Tương lai đơn',
            'signal_words'=> 'in one year, next week, tomorrow',
            'common' => 1,
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'Fact, action or event in the future'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He will speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He won’t speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Will he speak?'],

            ['tenses_id'=> $tenseId, 'describe' => 'I will be thirty years old next year.'],
            ['tenses_id'=> $tenseId, 'describe' => 'I won’t be thirty years old again.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Will I be thirty years old again?'],

            ['tenses_id'=> $tenseId, 'describe' => 'We‘ll meet them at the station at six. '],
            ['tenses_id'=> $tenseId, 'describe' => 'We won’t meet them at the station.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Where will we meet them?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You‘ll cross the channel by ferry.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You won’t cross the channel.'],
            ['tenses_id'=> $tenseId, 'describe' => 'How will you cross the channel?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Future Progressive -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Future Progressive',
            'name_vi' => 'tương lai tiếp diễn',
            'signal_words'=> 'in one year, next week, tomorrow'
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'An action will be in progress at a certain time in the future.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Something happens because it normally happens.'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He will be speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He will not be speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Will he be speaking?'],

            ['tenses_id'=> $tenseId, 'describe' => 'This time tomorrow we will be flying to Los Angeles.'],
            ['tenses_id'=> $tenseId, 'describe' => 'We won’t be flying to New York. '],
            ['tenses_id'=> $tenseId, 'describe' => 'Where will we be flying?'],

            ['tenses_id'=> $tenseId, 'describe' => 'We will be celebrating like Kings if it works.'],
            ['tenses_id'=> $tenseId, 'describe' => 'We will not be celebrating like Kings if it fails.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Will we be celebrating like Kings if it works?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You‘ll be doing housework with me at six tomorrow.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You won’t be playing football.'],
            ['tenses_id'=> $tenseId, 'describe' => 'What will you be doing at six tomorrow?'],

            ['tenses_id'=> $tenseId, 'describe' => 'I‘ll be playing tennis from seven to nine.'],
            ['tenses_id'=> $tenseId, 'describe' => 'I won’t be playing tennis at six.'],
            ['tenses_id'=> $tenseId, 'describe' => 'When will I be playing tennis?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Future Perfect Simple -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Future Perrect Simple',
            'name_vi' => 'Tương lai hoàn thành',
            'signal_words'=> 'by Monday, in a week'
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action that will be finished at a certain time in the future'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He will have spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He will not have spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Will he have spoken?'],

            ['tenses_id'=> $tenseId, 'describe' => 'I will have done this work by the end of next week.'],
            ['tenses_id'=> $tenseId, 'describe' => 'I won’t have done this work by the end of next week.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Will I have done this work by the end of next week?'],

            ['tenses_id'=> $tenseId, 'describe' => 'They‘ll have arrived by the time we return.'],
            ['tenses_id'=> $tenseId, 'describe' => 'They won’t have arrived by the time we return.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Will they have arrived by the time we return?'],

            ['tenses_id'=> $tenseId, 'describe' => 'She will have taken three exams by next Tuesday.'],
            ['tenses_id'=> $tenseId, 'describe' => 'She won’t have taken any exams by next Tuesday.'],
            ['tenses_id'=> $tenseId, 'describe' => 'How many exams will she have taken by next Tuesday?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Future Perfect Progressive -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Future Perfect Progressive',
            'name_vi' => 'Tương lai tiếp diễn',
            'signal_words'=> 'for …, the last couple of hours, all day long'
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'Action completed by or still in progress at a given time of the future (with the progress emphasized)'],
            ['tenses_id'=> $tenseId, 'describe' => 'putting emphasis on the course of an action'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He will have been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He will not have been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Will he have been speaking?'],

            ['tenses_id'=> $tenseId, 'describe' => 'We will have been staying here for a week tomorrow.'],
            ['tenses_id'=> $tenseId, 'describe' => 'We won’t have been staying here for a week tomorrow.'],
            ['tenses_id'=> $tenseId, 'describe' => 'How long will we have been staying here?'],

            ['tenses_id'=> $tenseId, 'describe' => 'You will have been living here for thirty years by this time next year.'],
            ['tenses_id'=> $tenseId, 'describe' => 'You won’t have been living here for thirty years by this time next year'],
            ['tenses_id'=> $tenseId, 'describe' => 'How long will you have been living here by this time next year?'],

            ['tenses_id'=> $tenseId, 'describe' => 'I‘ll have been playing the guitar for ten years by next year.'],
            ['tenses_id'=> $tenseId, 'describe' => 'I won’t have been playing the guitar for ten years by next year.'],
            ['tenses_id'=> $tenseId, 'describe' => 'How long will I have been playing the guitar?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Conditional I Simple -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Conditional I Simple',
            'name_vi' => 'Câu điều kiện loại I',
            'signal_words'=> 'if sentences type II(If I were you, I would go home.)',
            'common' => 1,
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action that might take place'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'If He was you, He would speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'If He was you, He would not speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'If He was you, Would he speak?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Conditional I Progressive -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Conditional I Progressive',
            'name_vi' => 'Câu điều kiện loại I tiếp diễn',
            'signal_words'=> ''
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action that might take place'],
            ['tenses_id'=> $tenseId, 'describe' => 'putting emphasis on the course / duration of the action'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'If He was you, He would be speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'If He was you, He would not be speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'If He was you, Would he be speaking?	'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Conditional II Simple -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Conditional II Simple',
            'name_vi' => 'Câu điều kiện loại II',
            'signal_words'=> 'if sentences type III (If I had seen that, I would have helped.)'
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action that might have taken place in the past'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He would have spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He would not have spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Would he have spoken?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);

        // ----------- Conditional II Progressive -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Conditional II Progressive',
            'name_vi' => 'Câu điều kiện loại II tiếp diễn',
            'signal_words'=> ''
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action that might have taken place in the past'],
            ['tenses_id'=> $tenseId, 'describe' => 'puts emphasis on the course / duration of the action'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'He would have been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'He would not have been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Would he have been speaking?'],
        ];

        $this->insertDB($tenseData, $tenseUse, $tenseExample);
        // ----------- done -----------------
    }

    public function insertDB($tenseData, $tenseUse, $tenseExample)
    {
        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);
    }
}
