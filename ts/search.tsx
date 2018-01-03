import * as React from 'react'

interface SearchState {
  input: string,
  ids: [string]
}

export class SearchApp extends React.Component<{}, SearchState> {
  constructor(props) {
    super(props)
    this.state = {
      input: '',
      ids: [] as [string]
    };
    this.handleChange = this.handleChange.bind(this);
    this.search = this.search.bind(this)
  }

  render() {
    const images = this.state.input.trim() == ''
      ? ''
      : this.state.ids.map((id) => <img src={`/thumb/${id}.png`} key={id} />)
    return (
      <div>
        <input type="text" value={this.state.input} onChange={this.handleChange} />
        <div>
          {images}
        </div>
      </div>
    );
  }

  handleChange(e) {
    this.setState({
      input: e.target.value
    }, this.search);
  }

  search() {
    const req = new XMLHttpRequest()
    req.onreadystatechange = () => {
      if (req.readyState === XMLHttpRequest.DONE) {
        if (req.status === 200) {
          console.log(req.responseText)
          const ids = JSON.parse(req.responseText)
          this.setState({ ids })
        } else {
          console.log('error')
        }
      }
    }
    req.open('GET', `/img?title=${encodeURI(this.state.input)}`)
    req.send()
  }
}
