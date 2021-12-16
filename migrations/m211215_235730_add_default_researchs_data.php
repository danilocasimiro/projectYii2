<?php

use yii\db\Migration;

/**
 * Class m211215_235730_add_default_researchs_data
 */
class m211215_235730_add_default_researchs_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $researches = [
            ['id'=>'2a6571da26602a67be14ea8c5ab82349', 'company_id'=> 'bdf6e74bf877e731093ed2dbeb2979f0',  'friendly_id' => 1, 'title' => 'Novo iphone',           'description' => 'Pesquisa de satisfação sobre o novo iphone!'],
            ['id'=>'b758a120f74a8c4f635befc9a4973772', 'company_id'=> 'bdf6e74bf877e731093ed2dbeb2979f0',  'friendly_id' => 2, 'title' => 'Urna eletronica',       'description' => 'O que o brasileiro pensa sobre nossa urna?'],
            ['id'=>'6b4a7d96627a8faf415a0a077c0437c1', 'company_id'=> 'bdf6e74bf877e731093ed2dbeb2979f0',  'friendly_id' => 3, 'title' => 'Governo federal',       'description' => 'Neste 3 anos, o que voce acha sobre nosso governo?'],
            ['id'=>'44b957ade65e1e8e8043bb214806dea1', 'company_id'=> 'bdf6e74bf877e731093ed2dbeb2979f0',  'friendly_id' => 4, 'title' => 'Personalidade do ano',  'description' => 'Este ano, Elon musk ganhou e o que voce pensa sobre isso?'],
            ['id'=>'d7267133279b27e31b46dcbe127e16a2', 'company_id'=> 'bdf6e74bf877e731093ed2dbeb2979f0',  'friendly_id' => 5, 'title' => 'Internet',              'description' => 'Influência dela sobre nossos jovens.'],
        ];

        $questionsTypes = [
            ['id'=>'c8582de4edf87a82d890abcdfa83cf2a', 'text'=> 'Gerais',  'friendly_id' => 1]
        ];

        $questionsIphone = [
            ['id'=>'ac7bb1e656486dc4fa220a28c4a7944a', 'research_id'=> '2a6571da26602a67be14ea8c5ab82349',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'De a sua nota sobre o custo beneficio do produto.',   'friendly_id' => 1],
            ['id'=>'25d8dd64e96122558e235bf574ef2806', 'research_id'=> '2a6571da26602a67be14ea8c5ab82349',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'A duração da bateria é boa?',                         'friendly_id' => 2],
            ['id'=>'f9eda0737d370e4d85905e04b5a1b3f5', 'research_id'=> '2a6571da26602a67be14ea8c5ab82349',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Você o indicaria a uma amigo ou familiar?',           'friendly_id' => 3],
            ['id'=>'e629a3d28c9d741d1b60969dcc98f401', 'research_id'=> '2a6571da26602a67be14ea8c5ab82349',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Sobre o acabamento, de sua opinião.',                 'friendly_id' => 4],
            ['id'=>'25b6d303cf7de2608ab0f84235d66724', 'research_id'=> '2a6571da26602a67be14ea8c5ab82349',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'De uma nota para a qualidade da camera',              'friendly_id' => 5],
        ];

        $questionsUrna = [
            ['id'=>'3f2152d1d678804a5861ec69a884bea5', 'research_id'=> 'b758a120f74a8c4f635befc9a4973772',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Qual o seu nível de confiança sobre a urna?',                     'friendly_id' => 6],
            ['id'=>'510d9ee116d116b84b0775275ac3d756', 'research_id'=> 'b758a120f74a8c4f635befc9a4973772',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Quanto você acha que é fácil de utilizar a urna?',                'friendly_id' => 7],
            ['id'=>'1bf0811875e7693ca8c319c28f9accb3', 'research_id'=> 'b758a120f74a8c4f635befc9a4973772',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'O comercial de informativo da urna é informativo o suficiente?',  'friendly_id' => 8],
            ['id'=>'5851c1dbfec435e238be037827fee803', 'research_id'=> 'b758a120f74a8c4f635befc9a4973772',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Qual o seu nivel de aceitação sobre a nova urna?',                'friendly_id' => 9],
            ['id'=>'aaf5252dcb5bdbfeb6a03a5271ae7b2a', 'research_id'=> 'b758a120f74a8c4f635befc9a4973772',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Como você vê o designer da urna?',                                'friendly_id' => 10],
        ];

        $questionsGoverno = [
            ['id'=>'05a48c6c290bf2034213ee3cf44dfe61', 'research_id'=> '6b4a7d96627a8faf415a0a077c0437c1',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Nível de confiança sobre o governo.',                       'friendly_id' => 11],
            ['id'=>'471cd6f70f1a95c213d6ed4ba72bad1d', 'research_id'=> '6b4a7d96627a8faf415a0a077c0437c1',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'O que você acha sobre os ministros?',                       'friendly_id' => 12],
            ['id'=>'8c25b9412a8024a38489016c994326c8', 'research_id'=> '6b4a7d96627a8faf415a0a077c0437c1',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Qual o nível de satisfação com as indicações para o STF?',  'friendly_id' => 13],
            ['id'=>'e078e4d9c988146f1c35172f006e6ecc', 'research_id'=> '6b4a7d96627a8faf415a0a077c0437c1',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'E se o governo atual for reeleito, o que voce acha?',       'friendly_id' => 14],
            ['id'=>'734ac4e3ff49bb2d8a10b65aab5c33da', 'research_id'=> '6b4a7d96627a8faf415a0a077c0437c1',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Tratamento do governo com o assunto reeleição.',            'friendly_id' => 15],
        ];

        $questionsPersonalidade = [
            ['id'=>'21f4682567947fd23c590414cd75138a', 'research_id'=> '44b957ade65e1e8e8043bb214806dea1',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Qual o seu nivel de empatia com o eleito?',     'friendly_id' => 16],
            ['id'=>'fdfc647b8ae9f141a71e9e6c9d9680b8', 'research_id'=> '44b957ade65e1e8e8043bb214806dea1',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'O que voce acha da revista Time',               'friendly_id' => 17],
            ['id'=>'62402858508fbc596379b252ca0961bf', 'research_id'=> '44b957ade65e1e8e8043bb214806dea1',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'A escolha foi?',                                'friendly_id' => 18],
            ['id'=>'9338f653580b4d3f0c6a879c50358079', 'research_id'=> '44b957ade65e1e8e8043bb214806dea1',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'A qualidade da materia é?',                     'friendly_id' => 19],
            ['id'=>'628ab7008a9ad12bebc7923a0c62665e', 'research_id'=> '44b957ade65e1e8e8043bb214806dea1',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Seu nivel de interesse sobre estes assuntos?',  'friendly_id' => 20],
        ];

        $questionsInternet = [
            ['id'=>'5a627fd8b993705a00e2f1f075513750', 'research_id'=> 'd7267133279b27e31b46dcbe127e16a2',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Qualidade da internet na sua região.',                        'friendly_id' => 21],
            ['id'=>'436849b1b7ef5f382f796da744c25a59', 'research_id'=> 'd7267133279b27e31b46dcbe127e16a2',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Como é o atendimento da sua operadora?',                      'friendly_id' => 22],
            ['id'=>'e8be9e64bb806162d286564fd0eb7574', 'research_id'=> 'd7267133279b27e31b46dcbe127e16a2',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Sua opinião sobre a cobertura da sua internet 3g.',           'friendly_id' => 23],
            ['id'=>'d511b54e50042626326dbfa239b3462b', 'research_id'=> 'd7267133279b27e31b46dcbe127e16a2',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'O valor cobrado corresponde a qualidade dos serviços?',       'friendly_id' => 24],
            ['id'=>'7419a01f4aede06eaad8c017aeceff3c', 'research_id'=> 'd7267133279b27e31b46dcbe127e16a2',  'question_type_id' => 'c8582de4edf87a82d890abcdfa83cf2a', 'text' => 'Seu nivel de acesso a informação no site da sua operadora?',  'friendly_id' => 25],
        ];
        
        $answerQuestionIphone = [
            ['id'=>'0555a0bc3804bf90c1dc73d690c0ff69', 'question_id'=> 'ac7bb1e656486dc4fa220a28c4a7944a',  'text' => 'Muito bom', 'friendly_id' => 1],
            ['id'=>'1e6c8c2b6da761336d88f6830cf5f065', 'question_id'=> 'ac7bb1e656486dc4fa220a28c4a7944a',  'text' => 'Bom', 'friendly_id' => 2],
            ['id'=>'525ee8f8170c73031526a402a394dca6', 'question_id'=> 'ac7bb1e656486dc4fa220a28c4a7944a',  'text' => 'Regular', 'friendly_id' => 3],
            ['id'=>'a9a1cc739ffee664dd1f38b599a276ad', 'question_id'=> 'ac7bb1e656486dc4fa220a28c4a7944a',  'text' => 'Ruim', 'friendly_id' => 4],
            ['id'=>'4664b86b4c0180614ebcc2a196d1c48d', 'question_id'=> 'ac7bb1e656486dc4fa220a28c4a7944a',  'text' => 'Muito ruim', 'friendly_id' => 5],
        ];

        $answerQuestionUrna = [
            ['id'=>'a8c7135954dee5ef2d2a1df85e7a7589', 'question_id'=> '25d8dd64e96122558e235bf574ef2806',  'text' => 'Muito bom', 'friendly_id' => 6],
            ['id'=>'587c9b1b433aed7a70e991ec81df36d5', 'question_id'=> '25d8dd64e96122558e235bf574ef2806',  'text' => 'Bom', 'friendly_id' => 7],
            ['id'=>'aa66ace4c95c22d76ad918bf1c8a66fe', 'question_id'=> '25d8dd64e96122558e235bf574ef2806',  'text' => 'Regular', 'friendly_id' => 8],
            ['id'=>'a1b1a304df2bae173cd31d707c7990ae', 'question_id'=> '25d8dd64e96122558e235bf574ef2806',  'text' => 'Ruim', 'friendly_id' => 9],
            ['id'=>'e620a210d626c68d6f994e846eeff6c9', 'question_id'=> '25d8dd64e96122558e235bf574ef2806',  'text' => 'Muito ruim', 'friendly_id' => 10],
        ];

        $answerQuestionGoverno = [
            ['id'=>'c9c113823eec2aeca2c652adbf99a19a', 'question_id'=> 'f9eda0737d370e4d85905e04b5a1b3f5',  'text' => 'Muito bom', 'friendly_id' => 11],
            ['id'=>'5dc6bc602f57704dbac68fb4b1227857', 'question_id'=> 'f9eda0737d370e4d85905e04b5a1b3f5',  'text' => 'Bom', 'friendly_id' => 12],
            ['id'=>'568309e2179e440e1fdef6f99c3d47b0', 'question_id'=> 'f9eda0737d370e4d85905e04b5a1b3f5',  'text' => 'Regular', 'friendly_id' => 13],
            ['id'=>'246cc0dd91e2ac6ab35ddae5f440f641', 'question_id'=> 'f9eda0737d370e4d85905e04b5a1b3f5',  'text' => 'Ruim', 'friendly_id' => 14],
            ['id'=>'02ace14748b93cd5487ae3ebdc804bff', 'question_id'=> 'f9eda0737d370e4d85905e04b5a1b3f5',  'text' => 'Muito ruim', 'friendly_id' => 15],
        ];
        
        $answerQuestionPersonalidade = [
            ['id'=>'50dbae5206eecbf26e0b0756cc9830de', 'question_id'=> 'e629a3d28c9d741d1b60969dcc98f401',  'text' => 'Muito bom', 'friendly_id' => 16],
            ['id'=>'e508705542312a73a71e2f97350c0c88', 'question_id'=> 'e629a3d28c9d741d1b60969dcc98f401',  'text' => 'Bom', 'friendly_id' => 17],
            ['id'=>'6ec56915185fb3da346308164380d84d', 'question_id'=> 'e629a3d28c9d741d1b60969dcc98f401',  'text' => 'Regular', 'friendly_id' => 18],
            ['id'=>'a7509a04e0afea200a47c07074d55546', 'question_id'=> 'e629a3d28c9d741d1b60969dcc98f401',  'text' => 'Ruim', 'friendly_id' => 19],
            ['id'=>'72a4453dd3cdd1030fa28edb6810e208', 'question_id'=> 'e629a3d28c9d741d1b60969dcc98f401',  'text' => 'Muito ruim', 'friendly_id' => 20],
        ];

        $answerQuestionInternet = [
            ['id'=>'f2476ead208d0e2456d2b619d4da758b', 'question_id'=> '25b6d303cf7de2608ab0f84235d66724',  'text' => 'Muito bom', 'friendly_id' => 21],
            ['id'=>'a8c43765d17746bf49dc5bd136586f22', 'question_id'=> '25b6d303cf7de2608ab0f84235d66724',  'text' => 'Bom', 'friendly_id' => 22],
            ['id'=>'fc1ff94dbb1bcbaf6cad9acdccb70973', 'question_id'=> '25b6d303cf7de2608ab0f84235d66724',  'text' => 'Regular', 'friendly_id' => 23],
            ['id'=>'15a0709d49a736de749f5c8a327a6621', 'question_id'=> '25b6d303cf7de2608ab0f84235d66724',  'text' => 'Ruim', 'friendly_id' => 24],
            ['id'=>'69f97a043b6c23315224892c484c6e20', 'question_id'=> '25b6d303cf7de2608ab0f84235d66724',  'text' => 'Muito ruim', 'friendly_id' => 25],
        ];


        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $answerQuestionIphone2 = [
            ['id'=>'678cacc43bb27a75626e3511c458c54c', 'question_id'=> '3f2152d1d678804a5861ec69a884bea5',  'text' => 'Muito bom', 'friendly_id' => 26],
            ['id'=>'5cf39793f23621578ff70575cdf2abe9', 'question_id'=> '3f2152d1d678804a5861ec69a884bea5',  'text' => 'Bom', 'friendly_id' => 27],
            ['id'=>'1672ad9e4c138465b4837b981144672a', 'question_id'=> '3f2152d1d678804a5861ec69a884bea5',  'text' => 'Regular', 'friendly_id' => 28],
            ['id'=>'cec28bcde9edfb9d9f73d55622b231cc', 'question_id'=> '3f2152d1d678804a5861ec69a884bea5',  'text' => 'Ruim', 'friendly_id' => 29],
            ['id'=>'0da7f5cf5cd74723c738d8d310b6b101', 'question_id'=> '3f2152d1d678804a5861ec69a884bea5',  'text' => 'Muito ruim', 'friendly_id' => 30],
        ];

        $answerQuestionUrna2 = [
            ['id'=>'1a2eac5af21f3677168457e9929ce873', 'question_id'=> '510d9ee116d116b84b0775275ac3d756',  'text' => 'Muito bom', 'friendly_id' => 31],
            ['id'=>'071c3add9a2902a0f9b8a1f01a6af9cf', 'question_id'=> '510d9ee116d116b84b0775275ac3d756',  'text' => 'Bom', 'friendly_id' => 32],
            ['id'=>'9228bd2ec49d891bf52b862dbf61473a', 'question_id'=> '510d9ee116d116b84b0775275ac3d756',  'text' => 'Regular', 'friendly_id' => 33],
            ['id'=>'ee152a40f6f64b95d82020bff21276d6', 'question_id'=> '510d9ee116d116b84b0775275ac3d756',  'text' => 'Ruim', 'friendly_id' => 34],
            ['id'=>'c1693ee3f858df02f157c4e9c367797f', 'question_id'=> '510d9ee116d116b84b0775275ac3d756',  'text' => 'Muito ruim', 'friendly_id' => 35],
        ];

        $answerQuestionGoverno2 = [
            ['id'=>'3a560dffa2d5c67e7096c12280151380', 'question_id'=> '1bf0811875e7693ca8c319c28f9accb3',  'text' => 'Muito bom', 'friendly_id' => 36],
            ['id'=>'0361fcc9b58b350eae4f0dc3a2a0a5ec', 'question_id'=> '1bf0811875e7693ca8c319c28f9accb3',  'text' => 'Bom', 'friendly_id' => 37],
            ['id'=>'6c0c4e4b2cb64d6e163e60380dd5c150', 'question_id'=> '1bf0811875e7693ca8c319c28f9accb3',  'text' => 'Regular', 'friendly_id' => 38],
            ['id'=>'04b2ead39bd9e8279f2e4fe208438de8', 'question_id'=> '1bf0811875e7693ca8c319c28f9accb3',  'text' => 'Ruim', 'friendly_id' => 39],
            ['id'=>'5c405588af530827aba73e3f5749b09c', 'question_id'=> '1bf0811875e7693ca8c319c28f9accb3',  'text' => 'Muito ruim', 'friendly_id' => 40],
        ];
        
        $answerQuestionPersonalidade2 = [
            ['id'=>'333190b07fc9c662259f62f365b87df6', 'question_id'=> '5851c1dbfec435e238be037827fee803',  'text' => 'Muito bom', 'friendly_id' => 41],
            ['id'=>'80a22a1dd215d8d9c14769c1b6518fa5', 'question_id'=> '5851c1dbfec435e238be037827fee803',  'text' => 'Bom', 'friendly_id' => 42],
            ['id'=>'a0b1bc8d13bfef3869068c3d219ee7dc', 'question_id'=> '5851c1dbfec435e238be037827fee803',  'text' => 'Regular', 'friendly_id' => 43],
            ['id'=>'0979acc871b396a19c1e1ee71aec0347', 'question_id'=> '5851c1dbfec435e238be037827fee803',  'text' => 'Ruim', 'friendly_id' => 44],
            ['id'=>'057775292788ea9dddd86d627d073812', 'question_id'=> '5851c1dbfec435e238be037827fee803',  'text' => 'Muito ruim', 'friendly_id' => 45],
        ];

        $answerQuestionInternet2 = [
            ['id'=>'aa6ba2ac4db4a56ac020abf7bfafbb06', 'question_id'=> 'aaf5252dcb5bdbfeb6a03a5271ae7b2a',  'text' => 'Muito bom', 'friendly_id' => 46],
            ['id'=>'9ed03ea97f9f3be4c3c27ff61a2a252b', 'question_id'=> 'aaf5252dcb5bdbfeb6a03a5271ae7b2a',  'text' => 'Bom', 'friendly_id' => 47],
            ['id'=>'669ddf2b748b0862251aad3fc34828d3', 'question_id'=> 'aaf5252dcb5bdbfeb6a03a5271ae7b2a',  'text' => 'Regular', 'friendly_id' => 48],
            ['id'=>'a74a6532614ea9985e2bc1e3ed5fd42c', 'question_id'=> 'aaf5252dcb5bdbfeb6a03a5271ae7b2a',  'text' => 'Ruim', 'friendly_id' => 49],
            ['id'=>'9a111dc791971af76161f25957bd2496', 'question_id'=> 'aaf5252dcb5bdbfeb6a03a5271ae7b2a',  'text' => 'Muito ruim', 'friendly_id' => 50],
        ];
    
///////////////////////////////////////////////////////////////////////////////////////////////
        $answerQuestionIphone3 = [
            ['id'=>'16e23de438815e9196e0a7393ee034d0', 'question_id'=> '05a48c6c290bf2034213ee3cf44dfe61',  'text' => 'Muito bom', 'friendly_id' => 51],
            ['id'=>'c73861d81c717c7134741fed587781ca', 'question_id'=> '05a48c6c290bf2034213ee3cf44dfe61',  'text' => 'Bom', 'friendly_id' => 52],
            ['id'=>'3e4f4c85e7c0dfa910e862f0c93f0a69', 'question_id'=> '05a48c6c290bf2034213ee3cf44dfe61',  'text' => 'Regular', 'friendly_id' => 53],
            ['id'=>'85d63b55c541a5d810bba693187770db', 'question_id'=> '05a48c6c290bf2034213ee3cf44dfe61',  'text' => 'Ruim', 'friendly_id' => 54],
            ['id'=>'08ed5d75eafd0a6599b5b2b5572e1f66', 'question_id'=> '05a48c6c290bf2034213ee3cf44dfe61',  'text' => 'Muito ruim', 'friendly_id' => 55],
        ];

        $answerQuestionUrna3 = [
            ['id'=>'c349d73557f92c40f769e9f2ea84229d', 'question_id'=> '471cd6f70f1a95c213d6ed4ba72bad1d',  'text' => 'Muito bom', 'friendly_id' => 56],
            ['id'=>'8eb1d516bb032440b186d0950fc2c6fe', 'question_id'=> '471cd6f70f1a95c213d6ed4ba72bad1d',  'text' => 'Bom', 'friendly_id' => 57],
            ['id'=>'c05fcb1c116de0cf911c4f6f80d18d3d', 'question_id'=> '471cd6f70f1a95c213d6ed4ba72bad1d',  'text' => 'Regular', 'friendly_id' => 58],
            ['id'=>'073240013517b3731a6daf62cda23d30', 'question_id'=> '471cd6f70f1a95c213d6ed4ba72bad1d',  'text' => 'Ruim', 'friendly_id' => 59],
            ['id'=>'7839b28e7f575e0e35b86c6e85e58912', 'question_id'=> '471cd6f70f1a95c213d6ed4ba72bad1d',  'text' => 'Muito ruim', 'friendly_id' => 60],
        ];

        $answerQuestionGoverno3 = [
            ['id'=>'05aa5511a47fda45d969ca8d42686440', 'question_id'=> '8c25b9412a8024a38489016c994326c8',  'text' => 'Muito bom', 'friendly_id' => 61],
            ['id'=>'8c0e288ff7ae69c9b1c1d59630d3aa4f', 'question_id'=> '8c25b9412a8024a38489016c994326c8',  'text' => 'Bom', 'friendly_id' => 62],
            ['id'=>'d9558c2cbe9dc53e189a7f599147d67d', 'question_id'=> '8c25b9412a8024a38489016c994326c8',  'text' => 'Regular', 'friendly_id' => 63],
            ['id'=>'26e95fc3540ab1656fb285ec8f105dba', 'question_id'=> '8c25b9412a8024a38489016c994326c8',  'text' => 'Ruim', 'friendly_id' => 64],
            ['id'=>'80b7f47761230bfd0297774c12566eff', 'question_id'=> '8c25b9412a8024a38489016c994326c8',  'text' => 'Muito ruim', 'friendly_id' => 65],
        ];
        
        $answerQuestionPersonalidade3 = [
            ['id'=>'ceb49b8b6b79276bfd18fed2aba3f0e5', 'question_id'=> 'e078e4d9c988146f1c35172f006e6ecc',  'text' => 'Muito bom', 'friendly_id' => 66],
            ['id'=>'b73834fe2fa5e77d6a1319543d7258c3', 'question_id'=> 'e078e4d9c988146f1c35172f006e6ecc',  'text' => 'Bom', 'friendly_id' => 67],
            ['id'=>'188de95bf6a7dc9dec151cc64926edb4', 'question_id'=> 'e078e4d9c988146f1c35172f006e6ecc',  'text' => 'Regular', 'friendly_id' => 68],
            ['id'=>'be5403d4c5a34e58abac9b814035e8c1', 'question_id'=> 'e078e4d9c988146f1c35172f006e6ecc',  'text' => 'Ruim', 'friendly_id' => 69],
            ['id'=>'6b83d01ca657fed4700a39b41103a7fc', 'question_id'=> 'e078e4d9c988146f1c35172f006e6ecc',  'text' => 'Muito ruim', 'friendly_id' => 70],
        ];

        $answerQuestionInternet3 = [
            ['id'=>'543fa69d8f85714c5d414658875631f6', 'question_id'=> '734ac4e3ff49bb2d8a10b65aab5c33da',  'text' => 'Muito bom', 'friendly_id' => 71],
            ['id'=>'7d72cb281b260041ee699daebb424778', 'question_id'=> '734ac4e3ff49bb2d8a10b65aab5c33da',  'text' => 'Bom', 'friendly_id' => 72],
            ['id'=>'6f9f2c91b7733abe2ab9a4fcd8318dc0', 'question_id'=> '734ac4e3ff49bb2d8a10b65aab5c33da',  'text' => 'Regular', 'friendly_id' => 73],
            ['id'=>'c6f3e77fb6246453e9e0a5bedb559494', 'question_id'=> '734ac4e3ff49bb2d8a10b65aab5c33da',  'text' => 'Ruim', 'friendly_id' => 74],
            ['id'=>'cb2b4bf9466a26b82e4e8f6a664c5c86', 'question_id'=> '734ac4e3ff49bb2d8a10b65aab5c33da',  'text' => 'Muito ruim', 'friendly_id' => 75],
        ];

        /////////////////////////////////////////////
        $answerQuestionIphone4 = [
            ['id'=>'e8baa7e2784aaf356c7b1715869c9667', 'question_id'=> '21f4682567947fd23c590414cd75138a',  'text' => 'Muito bom', 'friendly_id' => 76],
            ['id'=>'8038e38941900565a5e7992161eb293a', 'question_id'=> '21f4682567947fd23c590414cd75138a',  'text' => 'Bom', 'friendly_id' => 77],
            ['id'=>'b70a3a51463a4a2aba589886c9f2cae2', 'question_id'=> '21f4682567947fd23c590414cd75138a',  'text' => 'Regular', 'friendly_id' => 78],
            ['id'=>'523c7752497a8b6d77554a3a24f59773', 'question_id'=> '21f4682567947fd23c590414cd75138a',  'text' => 'Ruim', 'friendly_id' => 79],
            ['id'=>'ea07f189206ce5bb51ff5850e183f35f', 'question_id'=> '21f4682567947fd23c590414cd75138a',  'text' => 'Muito ruim', 'friendly_id' => 80],
        ];

        $answerQuestionUrna4 = [
            ['id'=>'7b0c9ea739964561158ccaee31fbf93a', 'question_id'=> 'fdfc647b8ae9f141a71e9e6c9d9680b8',  'text' => 'Muito bom', 'friendly_id' => 81],
            ['id'=>'eb685fa961c8f6dc287884f498362418', 'question_id'=> 'fdfc647b8ae9f141a71e9e6c9d9680b8',  'text' => 'Bom', 'friendly_id' => 82],
            ['id'=>'171e40af32859e9ad2677ac57633e499', 'question_id'=> 'fdfc647b8ae9f141a71e9e6c9d9680b8',  'text' => 'Regular', 'friendly_id' => 83],
            ['id'=>'c0fb04b65735267efcf197942cc88ef5', 'question_id'=> 'fdfc647b8ae9f141a71e9e6c9d9680b8',  'text' => 'Ruim', 'friendly_id' => 84],
            ['id'=>'e03a4ed0fdda9f55c288178d96d932a2', 'question_id'=> 'fdfc647b8ae9f141a71e9e6c9d9680b8',  'text' => 'Muito ruim', 'friendly_id' => 85],
        ];

        $answerQuestionGoverno4 = [
            ['id'=>'223e2b847e35f783dfeb9048d738f323', 'question_id'=> '62402858508fbc596379b252ca0961bf',  'text' => 'Muito bom', 'friendly_id' => 86],
            ['id'=>'85e394b6754cd70cdc30461ffb209781', 'question_id'=> '62402858508fbc596379b252ca0961bf',  'text' => 'Bom', 'friendly_id' => 87],
            ['id'=>'4852be81ccc4c0bb8f7d4718f4593ca1', 'question_id'=> '62402858508fbc596379b252ca0961bf',  'text' => 'Regular', 'friendly_id' => 88],
            ['id'=>'9e81bde1c9bf35596a624d4d812ac5e9', 'question_id'=> '62402858508fbc596379b252ca0961bf',  'text' => 'Ruim', 'friendly_id' => 89],
            ['id'=>'3fc34f18ff70eedef9cc2e4b76358a85', 'question_id'=> '62402858508fbc596379b252ca0961bf',  'text' => 'Muito ruim', 'friendly_id' => 90],
        ];
        
        $answerQuestionPersonalidade4 = [
            ['id'=>'f021b77ad53c2a1ace3d6f2ba6ce1cd0', 'question_id'=> '9338f653580b4d3f0c6a879c50358079',  'text' => 'Muito bom', 'friendly_id' => 91],
            ['id'=>'f9a702a4a51bbb84630e7d752cde5e86', 'question_id'=> '9338f653580b4d3f0c6a879c50358079',  'text' => 'Bom', 'friendly_id' => 92],
            ['id'=>'9f2cadaef56f27830a2ab10bc0e1500a', 'question_id'=> '9338f653580b4d3f0c6a879c50358079',  'text' => 'Regular', 'friendly_id' => 93],
            ['id'=>'2f139f72ade4e9c53b847acbd81d4262', 'question_id'=> '9338f653580b4d3f0c6a879c50358079',  'text' => 'Ruim', 'friendly_id' => 94],
            ['id'=>'8a4580bc6718cbaa691c293399c589ca', 'question_id'=> '9338f653580b4d3f0c6a879c50358079',  'text' => 'Muito ruim', 'friendly_id' => 95],
        ];

        $answerQuestionInternet4 = [
            ['id'=>'a42b0e0086de748fdaa04219b06465c4', 'question_id'=> '628ab7008a9ad12bebc7923a0c62665e',  'text' => 'Muito bom', 'friendly_id' => 96],
            ['id'=>'679f617f52ca9c8a73cfe63f0cf0bbd9', 'question_id'=> '628ab7008a9ad12bebc7923a0c62665e',  'text' => 'Bom', 'friendly_id' => 97],
            ['id'=>'009432091958533777899648d959b3a7', 'question_id'=> '628ab7008a9ad12bebc7923a0c62665e',  'text' => 'Regular', 'friendly_id' => 98],
            ['id'=>'bb751452a29259d81727c3d302c3f52b', 'question_id'=> '628ab7008a9ad12bebc7923a0c62665e',  'text' => 'Ruim', 'friendly_id' => 99],
            ['id'=>'16e3601b02ce7dfc48d670d402b1e535', 'question_id'=> '628ab7008a9ad12bebc7923a0c62665e',  'text' => 'Muito ruim', 'friendly_id' => 100],
        ];

        ///////////////////////////////////////////////////////////
        $answerQuestionIphone5 = [
            ['id'=>'6f947aa73ade7f4a7dc44a5e2e48e5fd', 'question_id'=> '5a627fd8b993705a00e2f1f075513750',  'text' => 'Muito bom', 'friendly_id' => 101],
            ['id'=>'2f2fda49668dfe2a91ecc22f04028a34', 'question_id'=> '5a627fd8b993705a00e2f1f075513750',  'text' => 'Bom', 'friendly_id' => 102],
            ['id'=>'ba591fbdd157be9ccba2300b9c14157b', 'question_id'=> '5a627fd8b993705a00e2f1f075513750',  'text' => 'Regular', 'friendly_id' => 103],
            ['id'=>'ae2a5510c1a477b4588c0c3dde5ad37c', 'question_id'=> '5a627fd8b993705a00e2f1f075513750',  'text' => 'Ruim', 'friendly_id' => 104],
            ['id'=>'2d4dc4095546f2669175fa6537897529', 'question_id'=> '5a627fd8b993705a00e2f1f075513750',  'text' => 'Muito ruim', 'friendly_id' => 105],
        ];

        $answerQuestionUrna5 = [
            ['id'=>'aad3e51fe1309594e45109a6f4574857', 'question_id'=> '436849b1b7ef5f382f796da744c25a59',  'text' => 'Muito bom', 'friendly_id' => 106],
            ['id'=>'5ac76cf2fa6d3588d865c23bba9229a0', 'question_id'=> '436849b1b7ef5f382f796da744c25a59',  'text' => 'Bom', 'friendly_id' => 107],
            ['id'=>'7923d019d6088e226a8dc8d014276d91', 'question_id'=> '436849b1b7ef5f382f796da744c25a59',  'text' => 'Regular', 'friendly_id' => 108],
            ['id'=>'14e0183827237b3e25c011aa92340418', 'question_id'=> '436849b1b7ef5f382f796da744c25a59',  'text' => 'Ruim', 'friendly_id' => 109],
            ['id'=>'2898e461aa8aacbb54bf56a4730ab594', 'question_id'=> '436849b1b7ef5f382f796da744c25a59',  'text' => 'Muito ruim', 'friendly_id' => 110],
        ];

        $answerQuestionGoverno5 = [
            ['id'=>'aa24ef2554c608844fb140b49d115908', 'question_id'=> 'e8be9e64bb806162d286564fd0eb7574',  'text' => 'Muito bom', 'friendly_id' => 111],
            ['id'=>'c459b6f26fb86f843b86ccedf80bebfc', 'question_id'=> 'e8be9e64bb806162d286564fd0eb7574',  'text' => 'Bom', 'friendly_id' => 112],
            ['id'=>'258a2f2c01a4bd6e6b5d63d0eb53f4b2', 'question_id'=> 'e8be9e64bb806162d286564fd0eb7574',  'text' => 'Regular', 'friendly_id' => 113],
            ['id'=>'2e3cb4b87fbf4221bdea5d67918ffe72', 'question_id'=> 'e8be9e64bb806162d286564fd0eb7574',  'text' => 'Ruim', 'friendly_id' => 114],
            ['id'=>'1e80505d2315bab744f635e71d52c563', 'question_id'=> 'e8be9e64bb806162d286564fd0eb7574',  'text' => 'Muito ruim', 'friendly_id' => 115],
        ];
        
        $answerQuestionPersonalidade5 = [
            ['id'=>'42b7c498944b3c4cca3f08f703ca1d93', 'question_id'=> 'd511b54e50042626326dbfa239b3462b',  'text' => 'Muito bom', 'friendly_id' => 116],
            ['id'=>'ce921a9c9e8dc85f861d970ed5179cdc', 'question_id'=> 'd511b54e50042626326dbfa239b3462b',  'text' => 'Bom', 'friendly_id' => 117],
            ['id'=>'4e82ed962ad4f1a191287b5f08ab5065', 'question_id'=> 'd511b54e50042626326dbfa239b3462b',  'text' => 'Regular', 'friendly_id' => 118],
            ['id'=>'d78061b8197f38d611dada8540114efd', 'question_id'=> 'd511b54e50042626326dbfa239b3462b',  'text' => 'Ruim', 'friendly_id' => 119],
            ['id'=>'3c3cf0baedba615fc781c80badbb8df1', 'question_id'=> 'd511b54e50042626326dbfa239b3462b',  'text' => 'Muito ruim', 'friendly_id' => 120],
        ];

        $answerQuestionInternet5 = [
            ['id'=>'10b3349cc31ce09da5a948b1a9f56915', 'question_id'=> '7419a01f4aede06eaad8c017aeceff3c',  'text' => 'Muito bom', 'friendly_id' => 121],
            ['id'=>'ace490dc0d39f57e28bfb4ce2526f4ad', 'question_id'=> '7419a01f4aede06eaad8c017aeceff3c',  'text' => 'Bom', 'friendly_id' => 122],
            ['id'=>'1b8b87a6eeebcabd00a6b4709d1058ff', 'question_id'=> '7419a01f4aede06eaad8c017aeceff3c',  'text' => 'Regular', 'friendly_id' => 123],
            ['id'=>'460623bb9816f9207116ab18e62b8557', 'question_id'=> '7419a01f4aede06eaad8c017aeceff3c',  'text' => 'Ruim', 'friendly_id' => 124],
            ['id'=>'fb21b447f2bf4704f484cfa98229be95', 'question_id'=> '7419a01f4aede06eaad8c017aeceff3c',  'text' => 'Muito ruim', 'friendly_id' => 125],
        ];

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('researches',  ['id', 'company_id', 'friendly_id', 'title', 'description'], $researches)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('questions_types',  ['id', 'text', 'friendly_id'], $questionsTypes)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('questions',  ['id', 'research_id', 'question_type_id', 'text', 'friendly_id'], $questionsIphone)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('questions',  ['id', 'research_id', 'question_type_id', 'text', 'friendly_id'], $questionsUrna)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('questions',  ['id', 'research_id', 'question_type_id', 'text', 'friendly_id'], $questionsGoverno)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('questions',  ['id', 'research_id', 'question_type_id', 'text', 'friendly_id'], $questionsPersonalidade)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('questions',  ['id', 'research_id', 'question_type_id', 'text', 'friendly_id'], $questionsInternet)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionIphone)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionUrna)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionGoverno)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionPersonalidade)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionInternet)
        ->execute();

        ///////////////
        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionIphone2)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionUrna2)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionGoverno2)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionPersonalidade2)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionInternet2)
        ->execute();

        ///////////

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionIphone3)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionUrna3)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionGoverno3)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionPersonalidade3)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionInternet3)
        ->execute();

        //////////////
        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionIphone4)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionUrna4)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionGoverno4)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionPersonalidade4)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionInternet4)
        ->execute();

        /////////
        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionIphone5)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionUrna5)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionGoverno5)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionPersonalidade5)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('answers',  ['id', 'question_id', 'text', 'friendly_id'], $answerQuestionInternet5)
        ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211215_235730_add_ddefaul_researchs_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211215_235730_add_ddefaul_researchs_data cannot be reverted.\n";

        return false;
    }
    */
}
