<?php

namespace DoctrineExtensions\Workflow;

class SchemaBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testSchemaCreate()
    {
        $conn = \DoctrineExtensions\Workflow\TestHelper::getConnection();

        $options = new WorkflowOptions('myprefix_');
        $builder = new SchemaBuilder($conn);
        $schema = $builder->getWorkflowSchema($options);

        $this->assertInstanceOf('Doctrine\DBAL\Schema\Schema', $schema);

        $this->assertFalse($schema->hasTable('workflow'));
        $this->assertTrue($schema->hasTable('myprefix_workflow'));
    }
}