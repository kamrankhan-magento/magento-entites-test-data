<?php

/**
 * @author Kamran Khan
 */
declare(strict_types=1);

namespace TestCompany\TestModule\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Sales\Model\OrderFactory;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Quote\Model\QuoteFactory;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Catalog\Model\Session as CatalogSession;

class EntityData implements ArgumentInterface
{
    private ProductRepositoryInterface $productRepository;
    private ProductFactory $productFactory;
    private CustomerFactory $customerFactory;
    private CustomerRepositoryInterface $customerRepository;
    private OrderFactory $orderFactory;
    private OrderRepositoryInterface $orderRepository;
    private QuoteFactory $quoteFactory;
    private CartRepositoryInterface $cartRepository;
    private CategoryFactory $categoryFactory;
    private CategoryRepositoryInterface $categoryRepository;
    private Session $customerSession;
    private CheckoutSession $checkoutSession;
    private CatalogSession $catalogSession;

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param ProductFactory $productFactory
     * @param CustomerFactory $customerFactory
     * @param CustomerRepositoryInterface $customerRepository
     * @param OrderFactory $orderFactory
     * @param OrderRepositoryInterface $orderRepository
     * @param QuoteFactory $quoteFactory
     * @param CartRepositoryInterface $cartRepository
     * @param CategoryFactory $categoryFactory
     * @param CategoryRepositoryInterface $categoryRepository
     * @param Session $customerSession
     * @param CheckoutSession $checkoutSession
     * @param CatalogSession $catalogSession
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        ProductFactory $productFactory,
        CustomerFactory $customerFactory,
        CustomerRepositoryInterface $customerRepository,
        OrderFactory $orderFactory,
        OrderRepositoryInterface $orderRepository,
        QuoteFactory $quoteFactory,
        CartRepositoryInterface $cartRepository,
        CategoryFactory $categoryFactory,
        CategoryRepositoryInterface $categoryRepository,
        Session $customerSession,
        CheckoutSession $checkoutSession,
        CatalogSession $catalogSession


    )
    {
        $this->productRepository = $productRepository;
        $this->productFactory = $productFactory;
        $this->customerFactory = $customerFactory;
        $this->customerRepository = $customerRepository;
        $this->orderFactory = $orderFactory;
        $this->orderRepository = $orderRepository;
        $this->quoteFactory = $quoteFactory;
        $this->cartRepository = $cartRepository;
        $this->categoryFactory = $categoryFactory;
        $this->categoryRepository = $categoryRepository;
        $this->customerSession = $customerSession;
        $this->checkoutSession = $checkoutSession;
        $this->catalogSession = $catalogSession;
    }

    /**
     * @return \Magento\Catalog\Api\Data\ProductInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getProductsFromRepository(): \Magento\Catalog\Api\Data\ProductInterface
    {
        return $this->productRepository->getById(1);
    }

    /**
     * @return \Magento\Catalog\Model\Product
     */
    public function getProductsFromFactory(): \Magento\Catalog\Model\Product
    {
        return $this->productFactory->create()->load(1);
    }

    public function getCustomersFromFactory(): \Magento\Customer\Model\Customer
    {
        return $this->customerFactory->create()->load(1);
    }

    public function getCustomersFromRepository(): \Magento\Customer\Api\Data\CustomerInterface
    {
        return $this->customerRepository->getById(1);
    }

    public function getOrdersFromRepository(): \Magento\Sales\Api\Data\OrderInterface
    {
        return $this->orderRepository->get(1);
    }

    public function getOrdersFromFactory(): \Magento\Sales\Model\Order
    {
        return $this->orderFactory->create()->load(1);
    }

    public function getQuotesFromFactory(): \Magento\Quote\Model\Quote
    {
        return $this->quoteFactory->create()->load(1);
    }

    public function getQuotesFromReposiory(): \Magento\Quote\Api\Data\CartInterface
    {
        return $this->cartRepository->get(1);
    }

    public function getCategoriesFromFactory(): \Magento\Catalog\Model\Category
    {
        return $this->categoryFactory->create()->load(1);
    }

    public function getCategoriesFromRepository(): \Magento\Catalog\Api\Data\CategoryInterface
    {
        return $this->categoryRepository->get(1);
    }

    public function getCustomerSessionData(): Session
    {
        return $this->customerSession;
    }

    public function getCheckoutSessionData(): CheckoutSession
    {
        return $this->checkoutSession;
    }

    public function getCatalogSessionData(): CatalogSession
    {
        return $this->catalogSession;
    }
}
