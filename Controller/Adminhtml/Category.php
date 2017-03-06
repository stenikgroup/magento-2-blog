<?php
/**
 * Mageplaza_Blog extension
 *                     NOTICE OF LICENSE
 *
 *                     This source file is subject to the MIT License
 *                     that is bundled with this package in the file LICENSE.txt.
 *                     It is also available through the world-wide-web at this URL:
 *                     http://opensource.org/licenses/mit-license.php
 *
 * @category  Mageplaza
 * @package   Mageplaza_Blog
 * @copyright Copyright (c) 2016
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */
namespace Mageplaza\Blog\Controller\Adminhtml;

abstract class Category extends \Magento\Backend\App\Action
{
    /**
     * Blog Category Factory
     *
     * @var \Mageplaza\Blog\Model\CategoryFactory
     */
    public $categoryFactory;

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    public $coreRegistry;

    /**
     * Result redirect factory
     *
     * @var \Magento\Backend\Model\View\Result\RedirectFactory
     */
    public $resultRedirectFactory;

    /**
     * constructor
     *
     * @param \Mageplaza\Blog\Model\CategoryFactory $categoryFactory
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        \Mageplaza\Blog\Model\CategoryFactory $categoryFactory,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\App\Action\Context $context
    ) {
    
        $this->categoryFactory       = $categoryFactory;
        $this->coreRegistry          = $coreRegistry;
        $this->resultRedirectFactory = $context->getRedirect();
        parent::__construct($context);
    }

    /**
     * Init Blog Category
     *
     * @return \Mageplaza\Blog\Model\Category
     */
	public function initCategory()
    {
        $categoryId  = (int) $this->getRequest()->getParam('category_id');
        /** @var \Mageplaza\Blog\Model\Category $category */
        $category    = $this->categoryFactory->create();
        if ($categoryId) {
            $category->load($categoryId);
        }
        $this->coreRegistry->register('mageplaza_blog_category', $category);
        return $category;
    }
}
