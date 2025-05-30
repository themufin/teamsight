<?php

namespace App\Controller\Admin;

use App\Entity\CompanyConfig;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class CompanyConfigCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CompanyConfig::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setPaginatorUseOutputWalkers(true);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ...parent::configureFields($pageName),
            AssociationField::new('company')
                ->setRequired(false)
                ->setFormTypeOption('by_reference', true),
        ];
    }
}
