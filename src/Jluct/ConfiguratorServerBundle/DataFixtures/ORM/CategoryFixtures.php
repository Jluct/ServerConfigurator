<?php
/**
 * Created by PhpStorm.
 * User: Inkognito
 * Date: 03.07.2017
 * Time: 17:02
 */

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Jluct\ConfiguratorServerBundle\Entity\Type;

class CategoryFixtures implements FixtureInterface
{


    public function load(ObjectManager $manager)
    {
        $count = count($this->getPhrases());
    }

    public function generateType()
    {

    }


    private function getPhrases()
    {
        return [
            'Lorem ', 'Pellentesque', 'Mauris', 'Eros',
            'Morbi', 'suscipit', 'eleifend ',
            'Aliquam', 'Urna', 'nisl', 'sollicitudin',
            'Nulla', 'Curabitur', 'aliquam', 'euismod', 'dolor',
            'Sed', 'varius', 'aliquam', 'Nunc', 'viverra',
            'elit', 'laoreet', 'Pellentesque', 'sapien',
            'pulvinar', 'consectetur', 'Abnobas',
        ];
    }

    private function getParams()
    {
        return [
            '-a', '-b', '-c', '-d', '-e', '-f', '-g', '-h'
        ];
    }

    private function getDubleParams()
    {
        return [
            '-at', '-bt', '-cR', '-dh', '-eQ', '-fA', '-gf', '-gY', '-aB'
        ];
    }

    private function getFullParametrs()
    {
        return [
            '--lorem', '--ipsum', '--Start', '--STOP', '--DATA', '--Baklan', '--test'
        ];
    }

    private function structure($count = 1)
    {
        $data = [];

        $fixture = [
            'file', [
                'group', [
                    'param', [
                        'primitive', 'primitive', 'primitive'
                    ]
                ], [
                    'param', [
                        'primitive', 'primitive', 'primitive', 'primitive'
                    ]
                ]
            ], [
                'group', [
                    'param', []
                ]
            ]
        ];

        for ($i = 0; $i < $count; $i++) {
            $data[] = $fixture;
        }

        return $data;
    }


}