<?php

use App\Clients\GitClient;

class GitTest extends TestCase {

    public function test_git_api_return_proper_repos_without_any_query() {

        $this->get('/stared-repos');
        $this->assertResponseStatus(422);
        $this->seeJsonContains(["message" => "Validation Failed"]);
    }

    public function test_git_api_return_proper_repos_without_q_query() {

        $this->get('/stared-repos?order=desc&per_page=5');
        $this->assertResponseStatus(422);
        $this->seeJsonContains(["message" => "Validation Failed"]);
    }

    public function test_git_api_return_proper_repos() {

        $param = "q=created:>2021-01-10%20stars:>100%20language:php&sort=stars&order=desc";

        $mock = Mockery::mock(GitClient::class);
        $mock->shouldReceive('getRepos')->with($param)
            ->andReturn(file_get_contents(__DIR__.'/result.json'))->once();

        $this->assertEquals(file_get_contents(__DIR__.'/result.json'), $mock->getRepos($param));

        $this->get('/stared-repos?stars=gt:500&created=gte:2020-01-10&per_page=5')->seeJson(['status_code' => 200]);
    }

}
