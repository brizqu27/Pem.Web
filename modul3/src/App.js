import './App.css';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import Aboutus from './components/Aboutus';

function App() {
  return (
    <div>
      <header>
         <p>Navbar</p>
        <Navbar/>
        <Aboutus/>
        <Footer/>
      </header>

    </div>
  );
}

export default App;
