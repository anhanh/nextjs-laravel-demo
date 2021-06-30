import styles from '../../styles/Blogs.module.css';
import Link from 'next/link';

export const getStaticProps = async () => {
  const res = await fetch('http://127.0.0.1:8000/api/blogs');
  const data = await res.json();

  return {
    props: { blogs: data },
    revalidate: 1,
  };
};

const Blogs = ({ blogs }) => {
  return (
    <div>
      <h1>All Blogs</h1>
      {blogs.map((blog) => (
        <Link href={'/blogs/' + blog.id} key={blog.id}>
          <a className={styles.single}>
            <h3>{blog.title}</h3>
          </a>
        </Link>
      ))}
    </div>
  );
};

export default Blogs;
