<?php
/**
 * Bookmark controller.
 */

namespace AppBundle\Controller;

use AppBundle\Repository\BookmarkRepository;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Pagerfanta;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class BookmarkController.
 *
 * @package AppBundle\Controller
 *
 * @Route("/bookmark")
 */
class BookmarkController extends Controller
{
    /**
     * Index action.
     *
     * @param integer $page Current page number
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @Route(
     *     "/{page}",
     *     requirements={"page": "\d+"},
     *     name="bookmark_index",
     * )
     * @Method("GET")
     */
    public function indexAction($page = 1)
    {
        $bookmarkRepository = new BookmarkRepository();
        $bookmarks = $bookmarkRepository->findAll();

        $adapter = new ArrayAdapter($bookmarks);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage(2);
        try {
            $pagerfanta->setCurrentPage($page);
        } catch(NotValidCurrentPageException $e) {
            throw new NotFoundHttpException();
        }
        return $this->render(
            '@App/bookmark/index.html.twig',
            ['paginator' => $pagerfanta]
        );
    }

    /**
     * Index action.
     *
     * @return \Symfony\Component\HttpFoundation\Response Response
     *
     * @Route(
     *     "/item/{id}",
     *     name="single_bookmark"
     * )
     */
    public function singleBookmark($id)
    {
        $bookmarkRepository = new BookmarkRepository();
        $bookmark = $bookmarkRepository->findOneById($id);

        return $this->render(
            '@App/bookmark/detail.html.twig',
            ['bookmark' => $bookmark]
        );
    }

}