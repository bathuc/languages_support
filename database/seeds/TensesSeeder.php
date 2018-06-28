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
            ['tenses_id'=> $tenseId, 'describe' => 'actions taking place one after another'],
            ['tenses_id'=> $tenseId, 'describe' => 'action set by a timetable or schedule'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'A: He speaks.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He does not speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Does he speak?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

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
            ['tenses_id'=> $tenseId, 'describe' => 'action taking place in the moment of speaking'],
            ['tenses_id'=> $tenseId, 'describe' => 'action taking place only for a limited period of time'],
            ['tenses_id'=> $tenseId, 'describe' => 'action arranged for the future'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'A: He is speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He is not speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Is he speaking?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

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
            ['tenses_id'=> $tenseId, 'describe' => 'action in the past taking place once, never or several times'],
            ['tenses_id'=> $tenseId, 'describe' => 'actions taking place one after another'],
            ['tenses_id'=> $tenseId, 'describe' => 'action taking place in the middle of another action'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'A: He spoke.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He did not speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Did he speak?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

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
            ['tenses_id'=> $tenseId, 'describe' => 'A: He was speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He was not speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Was he speaking?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

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
            ['tenses_id'=> $tenseId, 'describe' => 'putting emphasis on the result'],
            ['tenses_id'=> $tenseId, 'describe' => 'action that is still going on'],
            ['tenses_id'=> $tenseId, 'describe' => 'action that stopped recently'],
            ['tenses_id'=> $tenseId, 'describe' => 'finished action that has an influence on the present'],
            ['tenses_id'=> $tenseId, 'describe' => 'action that has taken place once, never or several times before the moment of speaking'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'A: He has spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He has not spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Has he spoken?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

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
            ['tenses_id'=> $tenseId, 'describe' => 'putting emphasis on the course or duration (not the result)'],
            ['tenses_id'=> $tenseId, 'describe' => 'action that recently stopped or is still going on'],
            ['tenses_id'=> $tenseId, 'describe' => 'finished action that influenced the present'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'A: He has been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He has not been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Has he been speaking?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

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
            ['tenses_id'=> $tenseId, 'describe' => 'A: He had spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He had not spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Had he spoken?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

        // ----------- Past Perfect Progressive -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Past Perfect',
            'name_vi' => 'quá khứ hoàn thành tiếp diễn',
            'signal_words'=> 'for, since, the whole day, all day'
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action taking place before a certain time in the past'],
            ['tenses_id'=> $tenseId, 'describe' => 'sometimes interchangeable with past perfect simple'],
            ['tenses_id'=> $tenseId, 'describe' => 'putting emphasis on the duration or course of an action'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'A: He had been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He had not been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Had he been speaking?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

        // ----------- Future I Simple -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Future I Simple',
            'name_vi' => 'Tương lai đơn (going to)',
            'signal_words'=> 'in one year, next week, tomorrow',
            'common' => 1,
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'decision made for the future'],
            ['tenses_id'=> $tenseId, 'describe' => 'conclusion with regard to the future'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'A: He is going to speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He is not going to speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Is he going to speak?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

        // ----------- Future I Progressive -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Future I Progressive',
            'name_vi' => 'tương lai tiếp diễn',
            'signal_words'=> 'in one year, next week, tomorrow'
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action that is going on at a certain time in the future'],
            ['tenses_id'=> $tenseId, 'describe' => 'action that is sure to happen in the near future'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'A: He will be speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He will not be speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Will he be speaking?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

        // ----------- Future II Simple -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Future II Simple',
            'name_vi' => 'Tương lai đơn II',
            'signal_words'=> 'by Monday, in a week'
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action that will be finished at a certain time in the future'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'A: He will have spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He will not have spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Will he have spoken?	'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

        // ----------- Future II Progressive -----------------
        $tenseId++;
        $tenseData = [
            'id'=> $tenseId,
            'name_eng'=> 'Future II Progressive',
            'name_vi' => 'Tương lai tiếp diễn',
            'signal_words'=> 'for …, the last couple of hours, all day long'
        ];

        $tenseUse =[
            ['tenses_id'=> $tenseId, 'describe' => 'action taking place before a certain time in the future'],
            ['tenses_id'=> $tenseId, 'describe' => 'putting emphasis on the course of an action'],
        ];

        $tenseExample =[
            ['tenses_id'=> $tenseId, 'describe' => 'A: He will have been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He will not have been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Will he have been speaking?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

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
            ['tenses_id'=> $tenseId, 'describe' => 'A: If He was you, He would speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: If He was you, He would not speak.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: If He was you, Would he speak?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

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
            ['tenses_id'=> $tenseId, 'describe' => 'A: If He was you, He would be speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: If He was you, He would not be speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: If He was you, Would he be speaking?	'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

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
            ['tenses_id'=> $tenseId, 'describe' => 'A: He would have spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He would not have spoken.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Would he have spoken?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

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
            ['tenses_id'=> $tenseId, 'describe' => 'A: He would have been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'N: He would not have been speaking.'],
            ['tenses_id'=> $tenseId, 'describe' => 'Q: Would he have been speaking?'],
        ];

        DB::table('tenses')->insert($tenseData);
        DB::table('tenses_use')->insert($tenseUse);
        DB::table('tenses_example')->insert($tenseExample);

        // ----------- done -----------------


    }
}
