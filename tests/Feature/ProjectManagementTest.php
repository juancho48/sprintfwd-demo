<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectManagementTest extends TestCase
{
    use RefreshDatabase;

    public function project_can_be_created(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/projects', [
                'name' => 'Test project',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/projects');

        $response->assertOk();
    }

    public function test_project_information_can_be_updated(): void
    {
        $user = User::factory()->create();

        $project = Project::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/projects/'.$project->id, [
                'project_name' => 'Test updated',
            ]);

        $response->assertSessionHasNoErrors()->assertRedirect('/projects');

        $project->refresh();

        $this->assertSame('Test updated', $project->project_name);

    }

    public function test_project_name_is_required(): void
    {
        $attributes = Project::factory()->raw(['project_name' => '']);

        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/projects', $attributes)
            ->assertSessionHasErrors('project_name');
    }

    public function test_project_can_be_deleted(): void
    {
        $user = User::factory()->create();

        $project = Project::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete('/projects/' . $project->id);

        $response->assertSessionHasNoErrors()
            ->assertRedirect('/projects');

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    public function test_guests_cannot_see_projects()
    {
        $project = Project::factory()->create();

        $this->get('/projects')->assertRedirect('login');

        $this->get('/projects/create')->assertRedirect('login');

        $this->get('/projects/' . $project->id.'/edit')->assertRedirect('login');

        $this->get('/projects/' . $project->id)->assertRedirect('login');
        
        $this->post('/projects', $project->toArray())->assertRedirect('login');
    }
}
